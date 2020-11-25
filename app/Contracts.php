<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contracts extends Model
{
    protected $table = "contracts";
    public function  request()
    {
        return $this->belongsTo("App\CustomerRequests", 'request_id');
    }
}
