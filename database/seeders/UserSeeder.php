<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create();

        \App\Models\User::create([
            'name' => 'test user',
            'email' => 'test@test.test',
            'password' => Hash::make('test'),
            'remember_token' => Str::random(10),
        ]);
    }
}
