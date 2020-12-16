<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProjectPrices extends Model
{
    protected $table = "project_multi_prices";
    public function  project()
    {
        return $this->belongsTo("App\Project", 'project_id');
    }
}
