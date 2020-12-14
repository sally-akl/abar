<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class blog extends Model
{
    protected $table = "blog";

    public function comments()
    {
      return $this->hasMany('App\Comments','blog_id');
    }
}
