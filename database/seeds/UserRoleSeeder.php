<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('user_roles')->insert([
                [
                    'role' => 'Super admin',
                ],
                [
                    'role' => 'admin',
                ],
                [
                    'role' => 'User',
                ]
        ]

        );
        DB::table('users')->insert([
            'name' => 'Super admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456),
            'role_id' => 1,
        ]);

    }
}
