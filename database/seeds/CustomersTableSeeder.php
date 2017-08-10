<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Customer1',
        ]);

        Customer::create([
            'name' => 'Customer2',
        ]);

        Customer::create([
            'name' => 'Customer3',
        ]);
    }
}
