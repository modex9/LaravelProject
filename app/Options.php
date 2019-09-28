<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $fillable = ['tax_rate', 'tax_inc_flag', 'global_discount', 'global_discount_is_fixed'];
}
