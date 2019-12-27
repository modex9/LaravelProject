<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    protected function taggable() {
        return $this->morphTo();
    }
}
