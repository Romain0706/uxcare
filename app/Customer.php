<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
    ];

    public function projects() {
        return $this->belongsToMany('App\Project');
    }

    public function campaigns() {
        return $this->belongsToMany('App\Campaign');
    }
}
