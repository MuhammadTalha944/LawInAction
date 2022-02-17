<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintLogs extends Model
{
    protected $table = 'complaint_logs';
    protected $fillable = ['id','complaint_id','redressal_status','redressal_status_from','remarks','created_by','deleted_at','created_at','updated_at'];


    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}
