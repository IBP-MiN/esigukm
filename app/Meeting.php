<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['title', 'description', 'meeting_date', 'meeting_start_time', 'meeting_end_time', 'location', 'sig', 'file_path', 'user_id'
];


    protected $table = 'meeting';

    public function users(){

        return $this->belongsTo(User::class, 'user_id');
        
    }

    public function follower(){
        return $this->belongsTo(Follower::class);
    }
}
