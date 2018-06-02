<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    
    public $fillable = ['student_id','text','photo_name'];

    public function student() 
    {
        
        return $this->belongsTo('App\student');
    }
}
