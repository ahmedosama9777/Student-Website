<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    //
    protected $timestamp = false;

    public function student() 
    {
        return $this->belongsTo('App\student');
    }
}
