<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CustomerRequests extends Model
{
    protected $table = "requests";
    public function  customer()
    {
        return $this->belongsTo("App\User", 'user_id');
    }
    public function  project()
    {
        return $this->belongsTo("App\Project", 'project_id');
    }
    public function visits()
    {
      return $this->hasMany('App\Visits','request_id');
    }
    public function  transaction()
    {
        return $this->hasMany("App\Transactions", 'request_id');
    }
    public function  media()
    {
        return $this->hasMany("App\RequestsMedia", 'request_id');
    }
    public function  extraproject()
    {
        return $this->belongsTo("App\ProjectPrices", 'sub_project');
    }
}
