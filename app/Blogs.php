<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';
    // protected $fillable = ['news_content','main_heading','sub_heading','main_highlight','secondary_highlight','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function blog_files(){
        return $this->hasMany(BlogsFiles::class,'blog_id');
    }
}
