<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", 'sku', "status", "base_price", 'individual_discount', "image", "description"];
}
