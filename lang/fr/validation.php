<?php

return [
    'required' => 'Le champ :attribute est obligatoire.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'unique' => 'La valeur du champ :attribute est déjà utilisée.',
    'min' => [
        'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
        'numeric' => 'Le champ :attribute doit être au moins :min.',
    ],
    'max' => [
        'string' => 'Le champ :attribute ne peut pas dépasser :max caractères.',
        'numeric' => 'Le champ :attribute ne peut pas dépasser :max.',
    ],
    'confirmed' => 'La confirmation du champ :attribute ne correspond pas.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'integer' => 'Le champ :attribute doit être un entier.',
    'image' => 'Le champ :attribute doit être une image.',
    'mimes' => 'Le champ :attribute doit être un fichier de type : :values.',
    'exists' => 'Le champ :attribute sélectionné est invalide.',
    'gte' => [
        'numeric' => 'Le champ :attribute doit être supérieur ou égal à :value.',
    ],

    'attributes' => [
        'name' => 'nom',
        'email' => 'email',
        'password' => 'mot de passe',
        'password_confirmation' => 'confirmation du mot de passe',
        'nom' => 'nom',
        'description' => 'description',
        'prix_achat' => 'prix d\'achat',
        'prix_vente' => 'prix de vente',
        'quantite' => 'quantité',
        'seuil_alerte' => 'seuil d\'alerte',
        'reference' => 'référence',
        'category_id' => 'catégorie',
        'image' => 'image',
        'telephone' => 'téléphone',
        'adresse' => 'adresse',
        'role' => 'rôle',
    ],
];
