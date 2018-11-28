<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = [
        'name', 'address', 'phone', 'description'
    ];


    public function product(){
        return $this->hasMany('App\Product');
    }
}
