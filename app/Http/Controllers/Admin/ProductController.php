<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

/**
 * Controller CRUD des Produits.
 */
class ProductController extends Controller
{
    /**
     * Lister tous les produits.
     */
    public function index(Request $request): View
    {
        $query = Product::with('category');

        // Recherche par nom ou référence
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('reference', 'like', "%{$search}%");
            });
        }

        // Filtre par catégorie
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filtre stock faible
        if ($request->filled('stock_filter')) {
            if ($request->stock_filter === 'faible') {
                $query->whereColumn('quantite', '<=', 'seuil_alerte');
            } elseif ($request->stock_filter === 'rupture') {
                $query->where('quantite', 0);
            }
        }

        $products = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::where('is_active', true)->orderBy('nom')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create(): View
    {
        $categories = Category::where('is_active', true)->orderBy('nom')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Enregistrer un nouveau produit.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Afficher les détails d'un produit.
     */
    public function show(Product $product): View
    {
        $product->load('category');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Afficher le formulaire d'édition.
     */
    public function edit(Product $product): View
    {
        $categories = Category::where('is_active', true)->orderBy('nom')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Mettre à jour un produit.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProduct($request, $product->id);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprimer un produit.
     */
    public function destroy(Product $product): RedirectResponse
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produit supprimé avec succès.');
    }

    /**
     * Validation centralisée pour les produits.
     */
    private function validateProduct(Request $request, ?int $productId = null): array
    {
        $uniqueRef = 'unique:products,reference' . ($productId ? ',' . $productId : '');

        return $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'reference' => ['required', 'string', 'max:100', $uniqueRef],
            'description' => ['nullable', 'string', 'max:2000'],
            'prix_achat' => ['required', 'numeric', 'min:0'],
            'prix_vente' => ['required', 'numeric', 'min:0', 'gte:prix_achat'],
            'quantite' => ['required', 'integer', 'min:0'],
            'seuil_alerte' => ['required', 'integer', 'min:0', 'lt:quantite'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'nom.required' => 'Le nom du produit est obligatoire.',
            'reference.required' => 'La référence est obligatoire.',
            'reference.unique' => 'Cette référence est déjà utilisée.',
            'prix_achat.required' => 'Le prix d\'achat est obligatoire.',
            'prix_vente.required' => 'Le prix de vente est obligatoire.',
            'prix_vente.gte' => 'Le prix de vente doit être supérieur ou égal au prix d\'achat.',
            'quantite.required' => 'La quantité est obligatoire.',
            'category_id.required' => 'Veuillez sélectionner une catégorie.',
            'image.image' => 'Le fichier doit être une image.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'seuil_alerte.lt' => 'Le seuil d\'alerte doit être inférieur à la quantité en stock.',
        ]);
    }
}
