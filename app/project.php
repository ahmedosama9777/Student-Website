<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    public function student()
    {
        return $this->belongsTo('App\student');
    }
}
