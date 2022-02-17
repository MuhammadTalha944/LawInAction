<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HateForm extends Model
{
    protected $table = 'hate_forms';
    protected $fillable = ['name','phone_number','email','country','hate_content','hate_content_url','offender_details','confidentiality','hateform_number','status_id'];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function hate_form_comments(){
        return $this->hasMany(HateFormComments::class);
    }

}
