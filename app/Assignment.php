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

    public function student()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function file_link()
    {
        return 'uploads/assignments/' . $this->file;
    }
}
