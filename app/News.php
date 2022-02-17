<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['news_content','main_heading','sub_heading','main_highlight','secondary_highlight','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function news_files(){
        return $this->hasMany(NewsFiles::class,'new_id');
    }
}
