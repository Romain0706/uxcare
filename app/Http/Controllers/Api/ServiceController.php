<?php

namespace App\Http\Controllers\Api;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ServiceController extends Controller
{
    public function index() {
        return Service::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required',
            'is_active' => 'required',
            'is_delete' => 'required',
        ]);

        $new_service = Service::create([
            'slug' => Input::get('slug'),
            'is_active' => Input::get('is_active'),
            'is_delete' => Input::get('is_delete'),
        ]);
        return $new_service;
    }
}
