<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFiles extends Model
{
    protected $table = 'news_files';
    protected $fillable = ['photo','photo_caption','video','video_caption','document','document_caption','link','link_caption','new_id'];
}
