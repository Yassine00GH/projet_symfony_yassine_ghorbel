<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\GestionnaireDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Web - Système de Gestion de Stock
|--------------------------------------------------------------------------
*/

// Redirection de la racine
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('gestionnaire.dashboard');
    }
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Routes d'authentification (invités uniquement)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Connexion
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Inscription (Sign up)
    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Mot de passe oublié
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.email');

    // Réinitialisation du mot de passe
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])
        ->name('password.update');
});

// Déconnexion (authentifiés uniquement)
Route::post('logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Routes Administrateur (admin uniquement)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestion des catégories
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Gestion des produits
    Route::resource('products', ProductController::class);

    // Gestion des utilisateurs (Admin uniquement)
    Route::resource('users', UserController::class)->except(['show']);
});

/*
|--------------------------------------------------------------------------
| Routes Gestionnaire (admin OU gestionnaire)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:gestionnaire,admin'])->prefix('gestionnaire')->name('gestionnaire.')->group(function () {
    Route::get('dashboard', [GestionnaireDashboardController::class, 'index'])->name('dashboard');

    // Les gestionnaires utilisent les mêmes controllers que les admins pour produits et catégories
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('products', ProductController::class);
});
