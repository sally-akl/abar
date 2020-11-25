<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transactions extends Model
{
    protected $table = "transactions";
    public function  project()
    {
        return $this->belongsTo("App\Project", 'project_id');
    }


}
