<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    protected $fillable = [
        'name', 'parent_id', 'description', 'image_url'
    ];

    public function product(){
        return $this->hasMany('App\Product');
    }
}
