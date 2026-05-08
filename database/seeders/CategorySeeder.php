<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nom' => 'Électronique', 'description' => 'Appareils électroniques et accessoires'],
            ['nom' => 'Vêtements', 'description' => 'Articles d\'habillement pour hommes, femmes et enfants'],
            ['nom' => 'Alimentation', 'description' => 'Produits alimentaires et boissons'],
            ['nom' => 'Beauté & Hygiène', 'description' => 'Produits cosmétiques et d\'hygiène personnelle'],
            ['nom' => 'Maison & Déco', 'description' => 'Articles pour la maison et décoration'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['nom' => $category['nom']], $category);
        }

        $this->command->info('✅ Catégories créées : ' . count($categories));
    }
}
