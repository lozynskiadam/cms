<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Adam Łożyński',
             'email' => 'admin@infirsoft.pl',
             'password' => '$2y$12$SYDqHJ7SEYQNuBn5V8NOPeTXX1Ox.APTBnWXbup7jej6UGQv04rry',
         ]);

        \App\Models\User::factory(10)->create();
    }
}
