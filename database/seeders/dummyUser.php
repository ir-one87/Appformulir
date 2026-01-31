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
                'name' => 'KominfoKab',
                'email' => 'Kominfokab@sulbarprov.go.id',
                'role' => 'Administrator',
                'opd_id' => '0',
                'password' => Hash::make('M4muju@2023')
            ],

        ];

        foreach ($userdata as $key => $val) {
            User::create($val);
        }
    }
}
