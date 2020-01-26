<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('index');
});



Route::group(['prefix' => 'student'], function () {
    Route::get('/register', 'Auth\RegisterUserController@showUserRegisterForm')->name('user.register');
    Route::post('/register', 'Auth\RegisterUserController@createUser')->name('user.register.post');
    Route::get('/login', 'Auth\LoginController@showUserLoginForm')->name('user.login');
    Route::post('/login', 'Auth\LoginController@userLogin')->name('user.login.post');
    Route::get('/logout', 'LoggedUserController@logout')->name('user.logout');
    Route::get('/dashboard', 'LoggedUserController@showDashboard')->name('user.dashboard');
    Route::get('/apply', 'LoggedUserController@showApply')->name('user.apply');
    Route::post('/apply', 'LoggedUserController@postApply')->name('user.apply.post');
    Route::get('/graduating', 'LoggedUserController@showGraduating')->name('user.graduating');
    Route::get('/courses/all', 'LoggedUserController@showAllcourses')->name('user.courses.all');
    Route::get('/courses/subscribe/{id}', 'LoggedUserController@subscribeForCourse')->name('user.courses.subscribe');
    Route::get('/course/{id}', 'LoggedUserController@getCourseById')->name('user.courses.view');
    Route::get('/courses/subscribed/', 'LoggedUserController@showMySubscribedCourses')->name('user.courses.subscribed');
    Route::get('/feedback', 'LoggedUserController@showFeedbackPage')->name('user.feedback.get');
    Route::post('/feedback', 'LoggedUserController@postFeedback')->name('user.feedback.post');
    Route::get('/assignment', 'LoggedUserController@showAssignmentPage')->name('user.assignment.get');
    Route::post('/assignment', 'LoggedUserController@postAssignment')->name('user.assignment.post');
    Route::get('/results', 'LoggedUserController@showResults')->name('user.results.get');
});

Route::group(['prefix' => 'lecturer'], function () {

    Route::get('/login', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::get('/register', 'Auth\LoginController@showAdminRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\LoginController@postAdminRegisterForm')->name('admin.register.post');
    Route::post('/login', 'Auth\LoginController@adminLogin')->name('admin.login.post');
    Route::get('/logout', 'LoggedAdminController@logout')->name('admin.logout');
    Route::get('/dashboard', 'LoggedAdminController@showDashboard')->name('admin.dashboard');
    Route::get('/addDepartment', 'LoggedAdminController@showAddDepartment')->name('admin.addDepartment');
    Route::post('/addDepartment', 'LoggedAdminController@postAddDepartment')->name('admin.addDepartment.post');
    Route::get('/addStudent', 'LoggedAdminController@showAddStudent')->name('admin.addStudent');
    Route::post('/addStudent', 'LoggedAdminController@postAddStudent')->name('admin.addStudent.post');
    Route::get('/graduating', 'LoggedAdminController@showGraduatingList')->name('admin.graduants');
    Route::get('/allStudent', 'LoggedAdminController@showAllStudents')->name('admin.allstudent');
    Route::get('/applications', 'LoggedAdminController@showApplications')->name('admin.applications');
    Route::get('/addCourse', 'LoggedAdminController@addCourse')->name('admin.addcourse');
    Route::post('/addCourse', 'LoggedAdminController@postAddCourse')->name('admin.addcourse.post');
    Route::get('/addContent', 'LoggedAdminController@addContent')->name('admin.addcontent');
    Route::post('/addContent', 'LoggedAdminController@postAddContent')->name('admin.addcontent.post');
    Route::get('/viewCourses', 'LoggedAdminController@viewCourses')->name('admin.viewcourses');
    Route::get('/course/{id}', 'LoggedAdminController@getCourseById')->name('admin.viewcourse.id');
    Route::get('/allCourses', 'LoggedAdminController@allCourses')->name('admin.allcourses');
    Route::get('/myCourses', 'LoggedAdminController@myCourses')->name('admin.mycourses');
    Route::get('/course/{id}/students', 'LoggedAdminController@showStudents')->name('admin.courses.showstudents');
    Route::get('/grade/{studentid}', 'LoggedAdminController@gradeStudent')->name('admin.student.grade');
    Route::post('/grade/student', 'LoggedAdminController@postGradeStudent')->name('admin.student.grade.post');
    Route::get('/submissions/{courseid}', 'LoggedAdminController@viewSubmissions')->name('admin.assignments.view');
});
