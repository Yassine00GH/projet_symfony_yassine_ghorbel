@extends('layouts.app')

@section('title', 'Nouveau produit')
@section('page-title', 'Nouveau produit')

@php $prefix = auth()->user()->isAdmin() ? 'admin' : 'gestionnaire'; @endphp

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form method="POST" action="{{ route($prefix.'.products.store') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">
                            Nom du produit <span class="text-red-500">*</span>
                        </label>
                        <input id="nom" type="text" name="nom" value="{{ old('nom') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nom') border-red-500 @enderror">
                        @error('nom') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="reference" class="block text-sm font-medium text-gray-700 mb-1">
                            Référence <span class="text-red-500">*</span>
                        </label>
                        <input id="reference" type="text" name="reference" value="{{ old('reference') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('reference') border-red-500 @enderror"
                            placeholder="Ex: REF-001">
                        @error('reference') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="3"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                            Catégorie <span class="text-red-500">*</span>
                        </label>
                        <select id="category_id" name="category_id" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('category_id') border-red-500 @enderror">
                            <option value="">-- Sélectionner --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image du produit</label>
                        <input id="image" type="file" name="image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-1 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="prix_achat" class="block text-sm font-medium text-gray-700 mb-1">
                            Prix d'achat (DT) <span class="text-red-500">*</span>
                        </label>
                        <input id="prix_achat" type="number" step="0.01" min="0" name="prix_achat" value="{{ old('prix_achat', 0) }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('prix_achat') border-red-500 @enderror">
                        @error('prix_achat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="prix_vente" class="block text-sm font-medium text-gray-700 mb-1">
                            Prix de vente (DT) <span class="text-red-500">*</span>
                        </label>
                        <input id="prix_vente" type="number" step="0.01" min="0" name="prix_vente" value="{{ old('prix_vente', 0) }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('prix_vente') border-red-500 @enderror">
                        @error('prix_vente') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="quantite" class="block text-sm font-medium text-gray-700 mb-1">
                            Quantité en stock <span class="text-red-500">*</span>
                        </label>
                        <input id="quantite" type="number" min="0" name="quantite" value="{{ old('quantite', 0) }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('quantite') border-red-500 @enderror">
                        @error('quantite') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="seuil_alerte" class="block text-sm font-medium text-gray-700 mb-1">
                            Seuil d'alerte <span class="text-red-500">*</span>
                        </label>
                        <input id="seuil_alerte" type="number" min="0" name="seuil_alerte" value="{{ old('seuil_alerte', 10) }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('seuil_alerte') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Une alerte sera affichée si le stock descend à ce niveau.</p>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Produit actif</span>
                    </label>
                </div>

                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route($prefix.'.products.index') }}"
                        class="px-5 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">Annuler</a>
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition">
                        Ajouter le produit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
