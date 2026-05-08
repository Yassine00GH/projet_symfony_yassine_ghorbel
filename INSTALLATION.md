# 🚀 Guide d'Installation Rapide (XAMPP)

## ⚡ Installation en 7 étapes

### 1️⃣ Prérequis à installer
- XAMPP : https://www.apachefriends.org/
- Composer : https://getcomposer.org/Composer-Setup.exe
- Node.js : https://nodejs.org/ (version LTS)

### 2️⃣ Démarrer XAMPP
Ouvrez le panneau XAMPP et cliquez sur **Start** pour :
- ✅ Apache
- ✅ MySQL

### 3️⃣ Créer la base de données
1. Ouvrez votre navigateur : http://localhost/phpmyadmin
2. Cliquez sur **Nouvelle base de données**
3. Nom : `stock_management`
4. Interclassement : `utf8mb4_unicode_ci`
5. Cliquez sur **Créer**

### 4️⃣ Placer le projet
Copiez le dossier `stock-management` dans :
```
C:\xampp\htdocs\stock-management
```

### 5️⃣ Ouvrir le terminal dans le dossier
- Clic droit dans le dossier → **Ouvrir dans le terminal**
- Ou : `cd C:\xampp\htdocs\stock-management`

### 6️⃣ Exécuter les commandes (dans l'ordre)

```bash
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run build
```

⏱️ Cela prend environ 3-5 minutes selon votre connexion.

### 7️⃣ Lancer le serveur

```bash
php artisan serve
```

✅ **Ouvrez votre navigateur à : http://localhost:8000**

---

## 🔐 Se connecter

**Administrateur** :
- Email : `admin@stock.com`
- Mot de passe : `admin123`

**Gestionnaire** :
- Email : `gestionnaire@stock.com`
- Mot de passe : `gestion123`

---

## ❌ Problèmes courants

### Erreur "SQLSTATE[HY000] [2002]"
→ MySQL n'est pas démarré dans XAMPP. Démarrez-le.

### Erreur "Class not found"
→ Exécutez : `composer dump-autoload`

### La page est blanche
→ Exécutez :
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Les images ne s'affichent pas
→ Exécutez : `php artisan storage:link`

### Le CSS n'est pas appliqué
→ Exécutez : `npm run build`

---

## 📹 Pour tester le "Mot de passe oublié"

En mode développement, les emails sont enregistrés dans un fichier log :

1. Allez sur http://localhost:8000/forgot-password
2. Saisissez un email existant (ex: admin@stock.com)
3. Ouvrez le fichier `storage/logs/laravel.log`
4. Cherchez le lien de réinitialisation (`http://localhost:8000/reset-password/...`)
5. Copiez-collez ce lien dans votre navigateur
6. Définissez un nouveau mot de passe

---

**Bon développement ! 🎉**
