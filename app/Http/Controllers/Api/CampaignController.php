<?php

namespace App\Http\Controllers\Api;

use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CampaignController extends Controller
{
    public function index() {
        return Campaign::all();
    }

    //changer description en slug
    public function store(Request $request)
    {
        $this->validate($request, [
            'service_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'is_active' => 'required',
            'is_delete' => 'required',
        ]);

        //changer description en slug
        $new_campaign = Campaign::create([
            'service_id' => Input::get('service_id'),
            'title' => Input::get('title'),
            'slug' => Input::get('slug'),
            'is_active' => Input::get('is_active'),
            'is_delete' => Input::get('is_delete'),
        ]);

        return $new_campaign;
    }
}
