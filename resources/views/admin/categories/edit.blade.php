@extends('layouts.app')

@section('title', 'Modifier catégorie')
@section('page-title', 'Modifier la catégorie')

@php $prefix = auth()->user()->isAdmin() ? 'admin' : 'gestionnaire'; @endphp

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form method="POST" action="{{ route($prefix.'.categories.update', $category) }}" class="space-y-5">
                @csrf @method('PUT')

                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">
                        Nom de la catégorie <span class="text-red-500">*</span>
                    </label>
                    <input id="nom" type="text" name="nom" value="{{ old('nom', $category->nom) }}" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nom') border-red-500 @enderror">
                    @error('nom') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $category->description) }}</textarea>
                </div>

                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Catégorie active</span>
                    </label>
                </div>

                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route($prefix.'.categories.index') }}"
                        class="px-5 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        Annuler
                    </a>
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
