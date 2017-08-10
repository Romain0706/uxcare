<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    public function index() {
        return Contact::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'user_id' => 'required',
        ]);

         $new_contact = Contact::create([
            'customer_id' => Input::get('customer_id'),
            'user_id' => Input::get('user_id'),
        ]);
        $projects = array([Input::get('project_id1'), Input::get('project_id2')]);
        foreach ($projects as $project) {
            $new_contact->projects()->attach($project);
        }

        return $new_contact;
    }
}
