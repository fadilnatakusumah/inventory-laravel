<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone', 'birthday', 'country', 'state', 'city', 'status'
    ];

    
}
