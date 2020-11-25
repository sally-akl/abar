<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Governate extends Model
{
    protected $table = "governate";
    public function  country()
    {
        return $this->belongsTo("App\Country", 'country_id');
    }
}
