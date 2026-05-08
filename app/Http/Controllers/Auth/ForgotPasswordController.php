<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

/**
 * Controller "Mot de passe oublié" - Étape 1 : Envoi du lien.
 */
class ForgotPasswordController extends Controller
{
    /**
     * Afficher le formulaire "mot de passe oublié".
     */
    public function showLinkRequestForm(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Envoyer le lien de réinitialisation.
     */
    public function sendResetLinkEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Un lien de réinitialisation a été envoyé à votre adresse email. Vérifiez votre boîte de réception (ou storage/logs/laravel.log en mode développement).')
            : back()->withErrors(['email' => 'Aucun compte trouvé avec cette adresse email.']);
    }
}
