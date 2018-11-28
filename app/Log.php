<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $fillabel = [
        'log_date', 'costumer_id', 'supplier_id', 'sum_selling', 'sum_buying'
    ];

    public function logDetail(){
        return $this->hasMany('App\logDetail');
    }

    public function costumer(){
        return $this->hasOne('App\Costumer');
    }
    
    public function supplier(){
        return $this->hasOne('App\Supplier');
    }
}
