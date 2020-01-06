<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $fillable  = [
        'id',
        'file',
        'course_id',
        'comments',
        'has_file',
        'user_id'
    ];
}
