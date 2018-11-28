<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogDetail extends Model
{
    protected $fillable = [
        'log_id', 'product_id', 'sum_product', 'price', 'sum_price'
    ];
}
