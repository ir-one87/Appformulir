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
                'name' => 'AdminKominfo',
                'email' => 'Kominfo@sulbarprov.go.id',
                'role' => 'admin',
                'opd_id' => '0',
                'password' => Hash::make('Kominfo@2023')
            ],

        ];

        foreach ($userdata as $key => $val) {
            User::create($val);
        }
    }
}
