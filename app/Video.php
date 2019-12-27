<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
