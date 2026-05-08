@extends('layouts.guest')

@section('title', 'Réinitialiser le mot de passe')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 mb-1">Nouveau mot de passe</h2>
    <p class="text-gray-600 text-sm mb-6">Choisissez un nouveau mot de passe sécurisé</p>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-800 rounded-lg text-sm">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required readonly
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-600">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Nouveau mot de passe</label>
            <input id="password" type="password" name="password" required autofocus
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                placeholder="Au moins 6 caractères">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le nouveau mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>

        <button type="submit"
            class="w-full py-2.5 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-lg shadow-md transition">
            Réinitialiser le mot de passe
        </button>
    </form>
@endsection
