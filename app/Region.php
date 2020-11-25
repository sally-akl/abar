<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Region extends Model
{
    protected $table = "regions";
    public function  gov()
    {
        return $this->belongsTo("App\Governate", 'gov_id');
    }
}
