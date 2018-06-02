<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    
    protected $fillable = ['user_id'];
    
    public function projects(){
        return $this->hasMany('App\project');
    }
    
    public function posts()
    {
        return $this->hasMany('App\post');
    }
    public function comments(){
        return $this->hasMany('App\comment');
    }
    public function notifications(){
        return $this->hasMany('App\notification');
    }
}
