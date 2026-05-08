# 📦 Système de Gestion de Stock - Projet PFE

Projet **Laravel 12** de gestion de stock pour boutique avec système d'authentification à deux rôles (Administrateur et Gestionnaire).

---

## 🎯 Fonctionnalités

### Authentification complète
- ✅ **Connexion** (Login) avec email/mot de passe
- ✅ **Inscription** (Sign up) pour nouveaux utilisateurs
- ✅ **Mot de passe oublié** (Forgot Password) avec envoi de lien par email
- ✅ **Réinitialisation** du mot de passe
- ✅ **Déconnexion** sécurisée

### Gestion des rôles
- 👑 **Administrateur** : accès total (utilisateurs + produits + catégories + dashboard complet)
- 👤 **Gestionnaire** : accès limité (produits + catégories + dashboard limité)

### Tableau de bord
- 📊 Statistiques en temps réel (total produits, stock faible, rupture, valeur du stock)
- ⚠️ Alertes automatiques pour stock faible
- 📈 Répartition visuelle par catégorie
- 🆕 Liste des produits récemment ajoutés

### Module Produits & Catégories (CRUD complet)
- Création, lecture, modification, suppression
- Upload d'images pour les produits
- Recherche et filtres (catégorie, stock faible, rupture)
- Seuils d'alerte personnalisables

---

## 🚀 Installation (avec XAMPP)

### Prérequis
- **XAMPP** (Apache + MySQL) → [Télécharger](https://www.apachefriends.org/)
- **PHP 8.2+** (inclus avec XAMPP récent)
- **Composer** → [Télécharger](https://getcomposer.org/)
- **Node.js 18+** → [Télécharger](https://nodejs.org/)

### Étapes d'installation

#### 1. Démarrer XAMPP
- Ouvrir le panneau de contrôle XAMPP
- Démarrer **Apache** et **MySQL**

#### 2. Créer la base de données
- Ouvrir **phpMyAdmin** : http://localhost/phpmyadmin
- Créer une nouvelle base de données nommée : `stock_management`
- Encodage : `utf8mb4_unicode_ci`

#### 3. Copier le projet
Placer le dossier du projet dans : `C:\xampp\htdocs\stock-management` (ou ailleurs).

#### 4. Ouvrir le terminal dans le dossier du projet et exécuter :

```bash
# Installer les dépendances PHP
composer install

# Installer les dépendances Node.js
npm install

# Copier le fichier d'environnement
cp .env.example .env    # Sur Windows : copy .env.example .env

# Générer la clé d'application
php artisan key:generate

# Créer les tables et les données de démonstration
php artisan migrate --seed

# Créer le lien symbolique pour les images
php artisan storage:link

# Compiler les assets CSS/JS
npm run build
```

#### 5. Lancer le serveur

```bash
php artisan serve
```

Le site sera accessible à : **http://localhost:8000**

---

## 🔑 Comptes de démonstration

Après avoir exécuté `php artisan migrate --seed`, vous avez accès à :

| Rôle              | Email                    | Mot de passe  |
| ----------------- | ------------------------ | ------------- |
| 👑 Administrateur | admin@stock.com          | admin123      |
| 👤 Gestionnaire   | gestionnaire@stock.com   | gestion123    |

---

## 📁 Structure du projet

```
stock-management/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/              # Login, Register, Password Reset
│   │   │   └── Admin/             # Dashboard, Users, Products, Categories
│   │   └── Middleware/
│   │       └── RoleMiddleware.php # Contrôle des rôles
│   └── Models/
│       ├── User.php
│       ├── Category.php
│       └── Product.php
├── database/
│   ├── migrations/                # Structure des tables
│   └── seeders/                   # Données de démo
├── resources/
│   └── views/
│       ├── auth/                  # Pages login, register, etc.
│       ├── layouts/               # Layouts (app, guest)
│       ├── admin/                 # Pages admin (dashboard, users, products)
│       └── gestionnaire/          # Page dashboard gestionnaire
├── routes/
│   └── web.php                    # Toutes les routes de l'app
└── .env                           # Configuration (DB, mail, etc.)
```

---

## 🔧 Configuration

### Base de données (fichier `.env`)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stock_management
DB_USERNAME=root
DB_PASSWORD=
```

> 💡 Par défaut avec XAMPP, l'utilisateur MySQL est `root` sans mot de passe.

### Email (développement)
Par défaut, les emails (mot de passe oublié) sont enregistrés dans `storage/logs/laravel.log`.
Pour tester :
1. Cliquez sur "Mot de passe oublié"
2. Saisissez votre email
3. Ouvrez `storage/logs/laravel.log` et copiez le lien de réinitialisation dans votre navigateur

---

## 🛡️ Sécurité

- ✅ CSRF Protection sur tous les formulaires
- ✅ Hash bcrypt pour les mots de passe
- ✅ Middleware de contrôle des rôles
- ✅ Validation stricte de tous les inputs
- ✅ Protection XSS via Blade templating

---

## 📝 Commandes utiles

```bash
# Réinitialiser complètement la base de données
php artisan migrate:fresh --seed

# Nettoyer les caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Lister toutes les routes
php artisan route:list

# Mode développement (watch CSS/JS)
npm run dev
```

---

## 🎓 Projet PFE

Ce projet a été développé dans le cadre d'un **Projet de Fin d'Études**.

**Technologies utilisées :**
- Laravel 12 (PHP 8.2+)
- MySQL / MariaDB (via XAMPP)
- Tailwind CSS v4
- Blade Template Engine
- Vite (compilation des assets)

---

## 📧 Support

En cas de problème :
1. Vérifiez que MySQL est bien démarré dans XAMPP
2. Vérifiez que la base `stock_management` existe dans phpMyAdmin
3. Consultez `storage/logs/laravel.log` pour les erreurs

---

**Bon développement ! 🚀**
