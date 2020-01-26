<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Material;

class Course extends Model
{
    //

    protected $fillable  = [
        'title',
        'author_id',
        'banner',
        'about',
    ];

    public function author()
    {
        return $this->belongsTo('App\Admin');
    }

    public function publicImage()
    {
        return 'uploads/' . $this->banner;
    }

    public function materials()
    {
        return $this->hasMany('App\Material');
    }

    public function grades()
    {
        return $this->hasMany('App\Grades');
    }
}
