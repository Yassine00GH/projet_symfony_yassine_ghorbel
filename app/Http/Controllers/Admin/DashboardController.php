<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

/**
 * Controller du Tableau de Bord Administrateur.
 */
class DashboardController extends Controller
{
    /**
     * Afficher le tableau de bord avec les statistiques.
     */
    public function index(): View
    {
        // Statistiques générales
        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_users' => User::count(),
            'stock_faible' => Product::whereColumn('quantite', '<=', 'seuil_alerte')
                ->where('quantite', '>', 0)->count(),
            'rupture_stock' => Product::where('quantite', 0)->count(),
            'valeur_stock' => Product::selectRaw('SUM(quantite * prix_achat) as total')
                ->value('total') ?? 0,
            'valeur_vente' => Product::selectRaw('SUM(quantite * prix_vente) as total')
                ->value('total') ?? 0,
        ];

        // Produits en stock faible (pour tableau d'alerte)
        $produitsAlerte = Product::with('category')
            ->whereColumn('quantite', '<=', 'seuil_alerte')
            ->orderBy('quantite')
            ->take(10)
            ->get();

        // Produits récemment ajoutés
        $produitsRecents = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        // Répartition par catégorie (pour graphique)
        $repartitionCategories = Category::withCount('products')
            ->orderByDesc('products_count')
            ->get();

        // Données pour le graphique de santé du stock
        $stockStatusData = [
            'disponible' => Product::whereColumn('quantite', '>', 'seuil_alerte')->count(),
            'alerte' => $stats['stock_faible'],
            'rupture' => $stats['rupture_stock'],
        ];

        // Top 5 produits par valeur
        $topProduitsValeur = Product::select('nom', \DB::raw('(quantite * prix_vente) as valeur_totale'))
            ->orderByDesc('valeur_totale')
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'stats',
            'produitsAlerte',
            'produitsRecents',
            'repartitionCategories',
            'stockStatusData',
            'topProduitsValeur'
        ));
    }
}
