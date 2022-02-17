<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HateFormLogs extends Model
{
    protected $table = 'hate_form_logs';
    protected $fillable = ['id','hate_form_id','redressal_status','redressal_status_from','remarks','created_by','deleted_at','created_at','updated_at'];


    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}
