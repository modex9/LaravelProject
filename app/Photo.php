<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected function photoable() {
        return $this->morphTo();
    }
}