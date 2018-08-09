<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['title', 'content'];
    /**
     * The categories that belong to the article.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    /**
     * The subcategories that belong to the article.
     */
    public function subcategories()
    {
        return $this->belongsToMany('App\Subcategory');
    }
    /**
     * Get the pics for the article.
     */
    public function pics()
    {
        return $this->hasMany('App\Pic');
    }

    /**
     * Get only one pic for the article.
     */
    public function one_pic()
    {
        return $this->pics()->take(1);
    }

    /**
     * Get slug from title.
     */
    public function getSlugFromTitle()
    {
        return Str::slug($this->title);
    }

    public function scopeTitle($query, $title)
    {
        return $query->where("title","like","%$title%");
    }

}
