<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * The articles that belong to the subcategory.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
