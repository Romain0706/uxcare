<?php

namespace App\Http\Controllers\Api;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function index() {
        return Customer::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:customers|max:255',
        ]);

        return Customer::create([
            'name' => Input::get('name'),
        ]);
    }
}
