<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Customer;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project1 = Project::create([
            'name' => 'Project 1',
            'slug' => 'zerdshsgsfedfg',
            'is_active' => 1,
            'is_delete' => 0,
        ]);

        $customer1 = Customer::where('id', '=', 1)->first();
        $project1->customers()->attach($customer1);
    }
}
