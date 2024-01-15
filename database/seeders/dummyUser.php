<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dummyUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userdata = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'opd_id' => '0',
                'password' => Hash::make('123456@')
            ],

            [
                'name' => 'kominfo',
                'email' => 'kominfo@gmail.com',
                'role' => 'operator',
                'opd_id' => '1',
                'password' => Hash::make('123456@')
            ],
        ];

        foreach ($userdata as $key => $val) {
            User::create($val);
        }
    }
}
