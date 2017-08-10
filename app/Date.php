<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    public function campaigns() {
        return $this->belongsToMany('App\Campaign');
    }
}
