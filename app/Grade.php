<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $fillable = [
        'course_id',
        'student_id',
        'author_id',
        'test_score',
        'exam_score',
        'total_score',
        'grade'
    ];
}
