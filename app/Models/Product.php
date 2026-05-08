<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modèle Product - Produits en stock
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'reference',
        'description',
        'prix_achat',
        'prix_vente',
        'quantite',
        'seuil_alerte',
        'image',
        'category_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'prix_achat' => 'decimal:2',
            'prix_vente' => 'decimal:2',
            'quantite' => 'integer',
            'seuil_alerte' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Relation : un produit appartient à une catégorie.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Vérifier si le stock est faible.
     */
    public function isStockFaible(): bool
    {
        return $this->quantite <= $this->seuil_alerte;
    }

    /**
     * Vérifier si le produit est en rupture.
     */
    public function isRupture(): bool
    {
        return $this->quantite <= 0;
    }

    /**
     * Calcul de la marge bénéficiaire.
     */
    public function getMargeAttribute(): float
    {
        return (float) ($this->prix_vente - $this->prix_achat);
    }

    /**
     * Obtenir le statut du stock avec libellé et couleur.
     */
    public function getStatutStockAttribute(): array
    {
        if ($this->isRupture()) {
            return ['label' => 'Rupture', 'color' => 'red'];
        }
        if ($this->isStockFaible()) {
            return ['label' => 'Stock faible', 'color' => 'yellow'];
        }
        return ['label' => 'Disponible', 'color' => 'green'];
    }
}
