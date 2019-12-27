<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected function posts() {
        return $this->morphedByMany('App\Post', 'taggable');
    }
    
    protected function videos() {
        return $this->morphedByMany('App\Video', 'taggable');
    }
}
