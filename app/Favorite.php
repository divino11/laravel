<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Favorite extends Model
{
    public function article() {
        return $this->belongsTo('App\Article');
    }

    public function articles() {
        return $this->morphedByMany('App\Article', 'favorityable');
    }
}
