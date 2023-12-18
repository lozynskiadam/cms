<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedPermissions();
        $this->seedAdmin();
    }

    protected function seedPermissions(): void
    {
        Role::findOrCreate(UserRole::ADMIN->value);
    }

    protected function seedAdmin(): void
    {
        if (User::exists(['email' => 'admin@infirsoft.pl']) === false) {
            $user = User::factory()->createOne([
                'name' => 'Adam Łożyński',
                'email' => 'admin@infirsoft.pl',
                'password' => Hash::make('admin'),
                'status' => UserStatus::ACTIVE
            ]);
            $user->assignRole(UserRole::ADMIN);
        }
    }
}
