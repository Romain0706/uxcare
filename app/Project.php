<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'slug', 'is_active', 'is_delete',
    ];

    public function customers() {
        return $this->belongsToMany('App\Customer');
    }

    public function contacts() {
        return $this->belongsToMany('App\Contact');
    }

    public function campaigns() {
        return $this->belongsToMany('App\Campaign');
    }
}
