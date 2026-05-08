<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Électronique
            ['nom' => 'Smartphone Samsung A15', 'reference' => 'SM-A15', 'prix_achat' => 1500, 'prix_vente' => 2200, 'quantite' => 25, 'seuil_alerte' => 5, 'category' => 'Électronique'],
            ['nom' => 'Écouteurs Bluetooth', 'reference' => 'EC-BT-01', 'prix_achat' => 80, 'prix_vente' => 150, 'quantite' => 50, 'seuil_alerte' => 10, 'category' => 'Électronique'],
            ['nom' => 'Chargeur USB-C', 'reference' => 'CH-USBC', 'prix_achat' => 30, 'prix_vente' => 60, 'quantite' => 3, 'seuil_alerte' => 10, 'category' => 'Électronique'],

            // Vêtements
            ['nom' => 'T-Shirt Coton Homme', 'reference' => 'TS-H-001', 'prix_achat' => 40, 'prix_vente' => 90, 'quantite' => 100, 'seuil_alerte' => 20, 'category' => 'Vêtements'],
            ['nom' => 'Jean Slim Femme', 'reference' => 'JN-F-002', 'prix_achat' => 120, 'prix_vente' => 250, 'quantite' => 0, 'seuil_alerte' => 10, 'category' => 'Vêtements'],

            // Alimentation
            ['nom' => 'Huile d\'Olive 1L', 'reference' => 'HO-1L', 'prix_achat' => 45, 'prix_vente' => 75, 'quantite' => 80, 'seuil_alerte' => 15, 'category' => 'Alimentation'],
            ['nom' => 'Miel Naturel 500g', 'reference' => 'MN-500', 'prix_achat' => 60, 'prix_vente' => 110, 'quantite' => 8, 'seuil_alerte' => 10, 'category' => 'Alimentation'],

            // Beauté
            ['nom' => 'Shampoing 400ml', 'reference' => 'SH-400', 'prix_achat' => 25, 'prix_vente' => 55, 'quantite' => 60, 'seuil_alerte' => 15, 'category' => 'Beauté & Hygiène'],

            // Maison
            ['nom' => 'Lampe de Bureau LED', 'reference' => 'LB-LED', 'prix_achat' => 90, 'prix_vente' => 180, 'quantite' => 15, 'seuil_alerte' => 5, 'category' => 'Maison & Déco'],
            ['nom' => 'Coussin Décoratif', 'reference' => 'CD-001', 'prix_achat' => 35, 'prix_vente' => 80, 'quantite' => 40, 'seuil_alerte' => 10, 'category' => 'Maison & Déco'],
        ];

        foreach ($products as $item) {
            $category = Category::where('nom', $item['category'])->first();
            if (! $category) continue;

            Product::updateOrCreate(
                ['reference' => $item['reference']],
                [
                    'nom' => $item['nom'],
                    'description' => 'Produit de qualité - ' . $item['nom'],
                    'prix_achat' => $item['prix_achat'],
                    'prix_vente' => $item['prix_vente'],
                    'quantite' => $item['quantite'],
                    'seuil_alerte' => $item['seuil_alerte'],
                    'category_id' => $category->id,
                    'is_active' => true,
                ]
            );
        }

        $this->command->info('✅ Produits créés : ' . count($products));
    }
}
