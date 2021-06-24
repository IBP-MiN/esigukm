<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user_id', 'meeting_id', 'attendance'
    ];

    public function meetings(){
        return $this->belongsTo(Meeting::class, 'meeting_id');
    }

    public function users(){

        return $this->belongsTo(User::class, 'user_id');
        
    }
}
