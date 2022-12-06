<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::create([
            'username' => 'indah',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'ismail',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'intan',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'enggar',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'vanya',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'kevin',
            'password' => Hash::make('password')
        ]);
    }
}
