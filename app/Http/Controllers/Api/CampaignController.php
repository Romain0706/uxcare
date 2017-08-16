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

    public function state(Request $request) {
        $this->validate($request, [
            'campaign_id' => 'required',
        ]);

        $campaign = Campaign::where('id', Input::get('campaign_id'))->first();
        if($campaign->is_active) {
            $campaign->update(['is_active' => 0]);
        } else {
            $campaign->update(['is_active' => 1]);
        }

        return 'ok';
    }

    public function search(Request $request) {
        $this->validate($request, [
            'search' =>  'required'
        ]);

        $searchInput = Input::get('search');

        $searchedCampaign = Campaign::where('title', 'like', '%'.$searchInput.'%')->get();

        return $searchedCampaign;
    }

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
