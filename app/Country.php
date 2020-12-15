<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    protected $table = "countries";

    public function projects()
    {
      return $this->hasMany('App\Project','category_id');
    }
}
