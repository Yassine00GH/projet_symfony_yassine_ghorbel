<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modèle Category - Catégories de produits
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Relation : une catégorie possède plusieurs produits.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Compter les produits actifs.
     */
    public function getProductsCountAttribute(): int
    {
        return $this->products()->count();
    }
}
