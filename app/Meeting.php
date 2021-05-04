<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['title','user_id','location','date_start','date_end','sig','description','image','live','phone_no'];

    // protected $guard = ['user_id'];

    protected $table = 'meeting';

    public function users(){

        return $this->belongsTo(User::class);
        
    }
}
