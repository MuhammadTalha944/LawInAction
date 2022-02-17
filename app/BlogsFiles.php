<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogsFiles extends Model
{
    protected $table = 'blogs_files';
    protected $fillable = ['photo','photo_caption','video','video_caption','blog_id'];
}
