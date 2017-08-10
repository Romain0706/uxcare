<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }
}
