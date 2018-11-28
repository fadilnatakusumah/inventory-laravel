<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'code', 'description', 'weight', 'price', 'status', 'category_product_id', 'supplier_id', 'stock'
    ];


    public function categoryProduct(){
        return $this->hasOne('App\CategoryProduct');
    }

}
