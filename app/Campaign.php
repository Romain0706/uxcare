<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'service_id', 'title', 'slug', 'is_active', 'is_delete',
    ];

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
