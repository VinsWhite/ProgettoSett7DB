<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Prova',
            'email' => 'prova@prova.com',
            'password' => Hash::make('provaprova'),
            'role' => 'admin',
       ]);
        User::factory(5)->create();
    }
}
