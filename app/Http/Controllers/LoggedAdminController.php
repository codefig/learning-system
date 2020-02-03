<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Department;
use App\Grade;
use App\Material;
use App\Submission;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Events\CourseCreated;
use Illuminate\Support\Facades\Redirect;
use Pusher\Pusher;

class LoggedAdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        return redirect()->route('admin.login');
    }

    public function showAddDepartment()
    {

        return view('admin.addDepartment');
    }

    public function postAddDepartment(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'faculty' => 'required',
        ]);
        $dept = new Department($request->all());
        $dept->save();
        $request->session()->flash('success', 'Department added successfully');
        return redirect()->back();
    }

    public function showAddStudent()
    {
        $departments = Department::all();

        return view('admin.addStudent', compact('departments'));
    }

    public function postAddStudent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'department' => 'required',
            'password' => 'required',
            'matric' => 'required|unique:users,matric',
        ]);

        $student = new User($request->all());
        $student->matric = $request->matric;
        $student->department = $request->department;
        $student->email_verified_at = null;
        $student->password = Hash::make($request->password);
        $student->is_graduating = $request->is_graduating;
        $student->is_approved = 0;
        $student->is_serving = 0;
        $student->save();
        $request->session()->flash('success', 'Student record added successfully');
        return redirect()->back();
    }

    public function showAllStudents()
    {
        $students = User::all();
        return view('admin.allstudents', compact('students'));
    }

    public function showGraduatingList()
    {
        $students = User::where('is_graduating', '=', 1)->get();
        return view('admin.graduating', compact('students'));
    }

    public function showApproved()
    {
        return view('admin.showapproved');
    }

    public function showApplications()
    {
        $applications = Submission::all();

        return view('admin.applications', compact('applications'));
    }

    public function approveSubmission($id)
    {
        return "Approve submission " . $id;
    }

    public function addCourse()
    {
        return view('admin.addCourse');
    }

    public function postAddCourse(Request $request)
    {
        $author_id = Auth::id();
        $this->validate($request, [
            'title' => 'required|unique:courses,NULL,title,id,author_id,' . Auth::id(),
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_course' => 'required'
        ], [
            'title.unique' => 'Sorry, You created a course with this title already',
        ]);

        $banner = 'banner-' . time() . '.' . $request->banner->getClientOriginalExtension();
        request()->banner->move(public_path('uploads'), $banner);

        $course = new Course();
        $course->title = $request->title;
        $course->author_id = Auth::id();
        $course->about = $request->about_course;
        $course->banner = $banner;
        $course->save();
        $request->session()->flash('success', 'Course Created successfully!');
        return redirect()->back();
    }

    public function addContent()
    {
        $mycourses = Course::where('author_id', Auth::id())->get();
        return  view('admin.addContent', compact('mycourses'));
    }

    public function postAddContent(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'course_id' => "required|integer",
            'info' => 'required',
            'media' => 'required|mimes:jpeg,png,jpg,docx,pdf,mp4,zip|max:51200'
        ]);

        $material = new Material($request->all());
        $image = $request->file('media');
        $media_file = time() . "__" . $request->media->getClientOriginalName();
        $image->move(public_path('materials'), $media_file);
        $material->author_id = Auth::id();
        $material->media = $media_file;
        $material->save();
        $request->session()->flash('success', 'Material Added to course  successfully!');
        return redirect()->back();
    }

    public function myCourses()
    {
        $courses = Course::where('author_id', Auth::id())->get();
        return view('admin.mycourses', compact('courses'));
    }

    public function allCourses()
    {
        return view('admin.allCourses');
    }

    public function getCourseById(Request $request, $id)
    {
        $course = Course::where('id', $id)->get();
        $materials = Material::where('course_id', $id)->get();
        $title = Course::where('id', $id)->first()->title;

        return view('admin.viewcourse', compact('course', 'materials', 'title'));
    }

    public function showStudents(Request $request, $courseId)
    {
        //Get all students with subscritption and user id in the subscription table.
        $subscriptions = Subscription::where('course_id', $courseId)->get()->toArray();
        $subscriptions_array = array_map(function ($sub) {
            return $sub['user_id'];
        }, $subscriptions);

        $students = User::all();
        $subscribed_students = array();
        foreach ($students as $student) {
            if (in_array($student->id, $subscriptions_array)) {
                array_push($subscribed_students, $student);
            }
        }
        return view('admin.courseStudents', compact('subscribed_students', 'courseId'));
        return $subscribed_students;
    }

    public function gradeStudent(Request $request, $studentId)
    {
        $mycourse = Course::where('id', $request->courseId)->get();
        $student = User::where('id', $studentId)->get();
        // return $student;
        return view('admin.addgrade', compact('mycourse', 'studentId', 'student'));
    }

    public function postGradeStudent(Request $request)
    {

        // return $request->all();

        $this->validate($request, [
            'test_score' => 'required|numeric',
            'exam_score' => 'required|numeric',
            'total_score' => 'required|numeric',
            'grade' => 'required',
            'course_id' => 'required',
            'student_id' => 'required|unique:grades,student_id,NULL,id,course_id,' . $request->course_id,
        ], [
            'student_id.unique' => 'Sorry, Result added for this student in this course already',
        ]);
        $grade = new Grade($request->all());
        $grade->author_id = Auth::id();
        $grade->save();
        $request->session()->flash('success', "Grade Added Successfully");
        return redirect()->back();
    }

    public function viewSubmissions(Request $request, $courseId)
    {
        $assignments = Assignment::where('course_id', $courseId)->get();
        return view('admin.assignments', compact('assignments'));
    }

    public function liveLectures(Request $request, $courseName)
    {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data['courseName'] = $courseName;
        $data['link'] = "https://6496700.vidyocloud.com/join/A5HWGi3iT0";
        $pusher->trigger('course-created', 'App\\Events\\CourseCreated', $data);
        return Redirect::to($data['link']);
    }
}
