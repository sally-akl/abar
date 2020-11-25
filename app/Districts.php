<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Districts extends Model
{
    protected $table = "districts";
    public function  region()
    {
        return $this->belongsTo("App\Region", 'region_id');
    }
}
