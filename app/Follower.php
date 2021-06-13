<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user_id', 'meeting_id'
    ];

    public function meetings(){
        return $this->belongsTo(Meeting::class, 'id');
    }

    public function users(){

        return $this->belongsTo(User::class, 'id');
        
    }
}
