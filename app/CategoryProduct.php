<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    protected $fillable = [
        'name', 'parent_id', 'description'
    ];

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function parent(){
        return $this->belongsTo('App\CategoryProduct', 'parent_id');
    }

    public function children(){
        return $this->hasMany('App\CategoryProduct', 'parent_id');
    }
}
