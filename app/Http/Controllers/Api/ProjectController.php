<?php

namespace App\Http\Controllers\Api;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    public function index() {
        return Project::all();
    }

    public function search(Request $request) {
        $this->validate($request, [
            'search' => 'required',
        ]);

        $searchInput = Input::get('search');

        $searchedProject = Project::where('name', 'like', '%'.$searchInput.'%')->get();

        return $searchedProject;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:customers|max:255',
            'slug' => 'required',
            'is_active' => 'required',
            'is_delete' => 'required',
            'customer_id' => 'required'
        ]);

        $new_project = Project::create([
            'name' => Input::get('name'),
            'slug' => Input::get('slug'),
            'is_active' => Input::get('is_active'),
            'is_delete' => Input::get('is_delete'),
        ]);
        $customer = Input::get('customer_id');
        $new_project->customers()->attach($customer);
        return $new_project;
    }
}
