<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedPermissions();
        $this->seedUsers();

//        User::factory(10)->create();
    }

    protected function seedPermissions(): void
    {
        $role = Role::create(['name' => 'admin']);
    }

    protected function seedUsers(): void
    {
        $user = User::factory()->createOne([
            'name' => 'Adam Łożyński',
            'email' => 'admin@infirsoft.pl',
            'password' => '$2y$12$SYDqHJ7SEYQNuBn5V8NOPeTXX1Ox.APTBnWXbup7jej6UGQv04rry',
        ]);
        $user->assignRole('admin');
    }
}
