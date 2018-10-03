<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Favorite;
use App\User;

class Article extends Model
{
    // Mass assigned
    protected $fillable = ['title', 'slug', 'description_short', 'description', 'image', 'image_show', 'meta_title', 'meta_description', 'meta_keyword', 'published', 'created_by', 'modified_by'];

    // Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmiHi'), '-');
    }

    //Polymorphic relation with category
    public function categories() {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function favorites() {
        return $this->morphToMany('App\Favorite', 'favorityable');
    }

    public function scopeLastArticles($query, $count) {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function like() {
        return $this->hasMany('App\Like');
    }

    public function favorite() {
        return $this->hasMany('App\Favorite');
    }
}
