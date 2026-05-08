<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Créer les comptes par défaut : Admin et Gestionnaire.
     */
    public function run(): void
    {
        // Compte Administrateur
        User::updateOrCreate(
            ['email' => 'admin@stock.com'],
            [
                'name' => 'Administrateur',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'telephone' => '0600000000',
                'adresse' => 'Siège Social',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Compte Gestionnaire
        User::updateOrCreate(
            ['email' => 'gestionnaire@stock.com'],
            [
                'name' => 'Gestionnaire',
                'password' => Hash::make('gestion123'),
                'role' => 'gestionnaire',
                'telephone' => '0611111111',
                'adresse' => 'Boutique Principale',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('✅ Comptes créés avec succès :');
        $this->command->info('   Admin         -> admin@stock.com / admin123');
        $this->command->info('   Gestionnaire  -> gestionnaire@stock.com / gestion123');
    }
}
