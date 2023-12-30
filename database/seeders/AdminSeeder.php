<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Pratik Dav',
                'email' => 'pratik@gmail.com',
                'password' => md5(123456),
                'address' => 'Munsef Bazar, Patiya, Chattogram',
                'number' => '01852088728',
                'role' => 'Super Admin',
                'status' => 1,
            ],
            [
                'name' => 'Pratik Dav',
                'email' => 'pra@gmail.com',
                'password' => md5(123456),
                'address' => 'Munsef Bazar, Patiya, Chattogram',
                'number' => '01852088728',
                'role' => 'Client',
                'status' => 1,
            ],

        ]);

    }
}
