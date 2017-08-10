<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'AdminTest',
            'email' => 'AdminTest@test.fr',
            'password' => bcrypt('testtest'),
        ]);
        $adminRole = Role::where('name', '=', 'admin')->first();
        $admin->attachRole($adminRole);

        $user = User::create([
            'name' => 'UserTest',
            'email' => 'UserTest@test.fr',
            'password' => bcrypt('testtest'),
        ]);
        $userRole = Role::where('name', '=', 'user')->first();
        $user->attachRole($userRole);
    }
}
