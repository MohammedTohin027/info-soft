<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  [
            'name' => 'Md Tohin',
            'email' => 'tohin420@gmail.com',
            'password' => Hash::make('00000000'),
        ];
        User::insert($admin);
    }
}