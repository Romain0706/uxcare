<?php

namespace App\Http\Controllers\Api;;

use App\Date;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function index() {
        return Date::all();
    }
}
