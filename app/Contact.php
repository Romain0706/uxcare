<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'customer_id', 'user_id'
    ];

    public function projects() {
        return $this->belongsToMany('App\Project');
    }
}
