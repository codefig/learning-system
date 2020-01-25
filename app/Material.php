<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //

    protected $fillable = [
        'author_id',
        'media',
        'course_id',
        'info',
        'title',
    ];

    public function isDocument()
    {
        $document_extensions = ['docx', 'pdf', 'doc', 'ppt', 'png', 'jpg'];
        $media_filename = $this->media;
        $extension = substr($this->media, -3);
        return in_array($extension, $document_extensions);
    }

    public function shortname()
    {
        return strlen($this->media) > 20 ? substr($this->media, 0, 20) . "..." : $this->media;
    }
    public function media()
    {
        return "materials/" . $this->media;
    }
}
