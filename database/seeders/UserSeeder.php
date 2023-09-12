<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'type_account' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'trader',
                'email' => 'admint@gmail.com',
                'type_account' => 'trader',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'salesman',
                'email' => 'admins@gmail.com',
                'type_account' => 'salesman',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'type_account' => $user['type_account'],
                'password' => $user['password'],
            ]);
        }

    }
}
