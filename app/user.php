<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;


class user extends Model implements Authenticatable 
{
    use \Illuminate\Auth\Authenticatable;               //To assign class user upon log in to be used to carry on functionalities

    
}
