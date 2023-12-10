<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'first_name' => 'Josna',
            'last_name' => 'Thomas',
            'user_type' => 'Supplier',
            'gender' => 'Female',
            'delivery_address' => null,
            'billing_address' => null,
            'phone_number' => '9447101692',
            'email_address' => 'josna@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('josna123'),
            'status' => 'Active',
         ]);
    }
}
