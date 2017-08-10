<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function dates() {
        return $this->belongsToMany('App\Date');
    }

    public  function customers() {
        return $this->belongsToMany('App\Customer');
    }

    public function projects() {
        return $this->belongsToMany('App\Project');
    }
}
