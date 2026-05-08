<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

/**
 * Controller du Tableau de Bord Gestionnaire.
 * Accès limité aux produits et catégories (pas de gestion des utilisateurs).
 */
class GestionnaireDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'stock_faible' => Product::whereColumn('quantite', '<=', 'seuil_alerte')
                ->where('quantite', '>', 0)->count(),
            'rupture_stock' => Product::where('quantite', 0)->count(),
            'valeur_stock' => Product::selectRaw('SUM(quantite * prix_achat) as total')
                ->value('total') ?? 0,
        ];

        $produitsAlerte = Product::with('category')
            ->whereColumn('quantite', '<=', 'seuil_alerte')
            ->orderBy('quantite')
            ->take(10)
            ->get();

        $produitsRecents = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('gestionnaire.dashboard', compact('stats', 'produitsAlerte', 'produitsRecents'));
    }
}
