<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", 'sku', "status", "base_price", 'individual_discount', "image", "description"];

//    public function review() {
//        return $this->hasOne('App\Review');
//    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($product) {
           $product->reviews()->delete();
        });
    }
}
