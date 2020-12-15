<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    protected $table = "projects";
    public function  country()
    {
        return $this->belongsTo("App\Country", 'category_id');
    }
    public function gov()
    {
        return $this->belongsTo("App\Governate", 'gov_id');
    }
    public function reg()
    {
        return $this->belongsTo("App\Region", 'region_id');
    }
    public function district()
    {
        return $this->belongsTo("App\Districts", 'district_id');
    }
    public function specialize()
    {
      return $this->hasMany('App\Specialize','project_id');
    }
    public function extracharacters()
    {
      return $this->hasMany('App\ProjectPrices','project_id');
    }

}
