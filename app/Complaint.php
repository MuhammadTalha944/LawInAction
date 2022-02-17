<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';
    protected $fillable = ['name','gender','age','phone_number','email','country','correspondence_address','state_id','district_id','police_station','pin_code','complaint_related_to','vistim_accused','fir_copy','grievance','id_proof','address_proof','photo','status_id', 'confidentiality','complaint_number','translated_file'];

    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function state(){
        return $this->hasOne(State::class, 'id');
    }
    public function district(){
        return $this->hasOne(District::class , 'id');
    }

    public function complaint_comments(){
        return $this->hasMany(ComplaintComments::class);
    }

    public function complaint_logs(){
        return $this->hasMany(ComplaintLogs::class,'complaint_id','id');
    }
}
