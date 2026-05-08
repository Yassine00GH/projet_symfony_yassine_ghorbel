@extends('layouts.guest')

@section('title', 'Connexion')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 mb-1">Connexion</h2>
    <p class="text-gray-600 text-sm mb-6">Accédez à votre espace de gestion</p>

    @if (session('success'))
        <div data-flash-message class="mb-4 p-3 bg-green-50 border border-green-200 text-green-800 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-800 rounded-lg text-sm">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                placeholder="exemple@stock.com">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
            <input id="password" type="password" name="password" required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                placeholder="••••••••">
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="ml-2 text-sm text-gray-700">Se souvenir de moi</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                Mot de passe oublié ?
            </a>
        </div>

        <button type="submit"
            class="w-full py-2.5 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-lg shadow-md transition transform hover:scale-[1.01]">
            Se connecter
        </button>
    </form>

    <div class="mt-6 text-center text-sm text-gray-600">
        Pas encore de compte ?
        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            S'inscrire
        </a>
    </div>

    <div class="mt-6 pt-4 border-t border-gray-200">
        <p class="text-xs text-gray-500 text-center mb-2"><strong>Comptes de démonstration :</strong></p>
        <div class="text-xs text-gray-500 space-y-1 bg-gray-50 p-3 rounded-lg">
            <div>🔐 <strong>Admin :</strong> admin@stock.com / admin123</div>
            <div>👤 <strong>Gestionnaire :</strong> gestionnaire@stock.com / gestion123</div>
        </div>
    </div>
@endsection
