<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\Module;
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
        $this->seedModules();
    }

    protected function seedPermissions(): void
    {
        Role::findOrCreate(UserRole::ADMIN->value);
    }

    protected function seedAdmin(): void
    {
        if (User::where(['email' => 'admin@infirsoft.pl'])->exists() === false) {
            $user = User::factory()->createOne([
                'name' => 'Adam Łożyński',
                'email' => 'admin@infirsoft.pl',
                'password' => Hash::make('admin'),
                'status' => UserStatus::ACTIVE
            ]);
            $user->assignRole(UserRole::ADMIN);
        }
    }

    protected function seedModules(): void
    {
        if (Module::where(['name' => 'blog'])->exists() === false) {
            Module::factory()->createOne([
                'name' => 'blog',
                'label' => 'Blog',
                'description' => 'Włącza podstawowe funkcje bloga',
                'is_enabled' => false
            ]);
        }

        if (Module::where(['name' => 'newsletter'])->exists() === false) {
            Module::factory()->createOne([
                'name' => 'newsletter',
                'label' => 'Newsletter',
                'description' => 'Odblokowuje możliwość zapisu użytkowników do newslettera',
                'is_enabled' => false
            ]);
        }

        if (Module::where(['name' => 'products'])->exists() === false) {
            Module::factory()->createOne([
                'name' => 'products',
                'label' => 'Produkty',
                'description' => 'Włącza pełne zarządzanie produktami',
                'is_enabled' => false
            ]);
        }

        if (Module::where(['name' => 'sales'])->exists() === false) {
            Module::factory()->createOne([
                'name' => 'sales',
                'label' => 'Sprzedaż',
                'description' => 'Włącza możliwość sprzedaży produktów',
                'depends_on' => 'products',
                'is_enabled' => false
            ]);
        }

        if (Module::where(['name' => 'promotions'])->exists() === false) {
            Module::factory()->createOne([
                'name' => 'promotions',
                'label' => 'Promocje',
                'description' => 'Włącza możliwość zarządzania promocjami',
                'depends_on' => 'sales',
                'is_enabled' => false
            ]);
        }

        if (Module::where(['name' => 'apaczka'])->exists() === false) {
            Module::factory()->createOne([
                'name' => 'apaczka',
                'label' => 'Apaczka',
                'description' => 'Włącza integracje z serwisem Apaczka',
                'depends_on' => 'sales',
                'is_enabled' => false
            ]);
        }

        if (Module::where(['name' => 'payu'])->exists() === false) {
            Module::factory()->createOne([
                'name' => 'payu',
                'label' => 'PayU',
                'description' => 'Włącza integracje z dostawcą płatności PayU',
                'depends_on' => 'sales',
                'is_enabled' => false
            ]);
        }

        if (Module::where(['name' => 'przelewy24'])->exists() === false) {
            Module::factory()->createOne([
                'name' => 'przelewy24',
                'label' => 'Przelewy24',
                'description' => 'Włącza integracje z dostawcą płatności Przelewy24',
                'depends_on' => 'sales',
                'is_enabled' => false
            ]);
        }
    }
}
