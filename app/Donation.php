<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donation';
    protected $fillable = ['*'];
    
    public function Campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    

}
