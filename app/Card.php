<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Card extends Model
{
  public static $image_path = 'img/card_pictures/';

  public function getSlugFromTitle()
  {
      return Str::slug($this->title);
  }
}
