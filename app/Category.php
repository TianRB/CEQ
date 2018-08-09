<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The articles that belong to the category.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
