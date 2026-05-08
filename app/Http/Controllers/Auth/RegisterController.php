<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

/**
 * Controller d'inscription (Sign up).
 */
class RegisterController extends Controller
{
    /**
     * Afficher le formulaire d'inscription.
     */
    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    /**
     * Enregistrer un nouvel utilisateur.
     * Par défaut, tous les nouveaux inscrits sont "gestionnaire".
     * Seul l'admin peut créer d'autres admins via la gestion des utilisateurs.
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'telephone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ], [
            'name.required' => 'Le nom complet est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => 'gestionnaire', // Par défaut
            'is_active' => true,
        ]);

        Auth::login($user);

        return redirect()->route('gestionnaire.dashboard')
            ->with('success', 'Votre compte a été créé avec succès. Bienvenue ' . $user->name . ' !');
    }
}
