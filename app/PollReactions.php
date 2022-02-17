<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollReactions extends Model
{
    protected $table = 'poll_reactions';

    public function polls()
    {
        return $this->belongsTo(Polls::class,'poll_id');
    }
}
