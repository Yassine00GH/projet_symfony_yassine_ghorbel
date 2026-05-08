# INSTITUT SUPÉRIEUR DES ÉTUDES TECHNOLOGIQUES DE NABEUL (ISET Nabeul)
**Département : Technologies de l'Informatique**

***

# RAPPORT DE PROJET DE FIN D'ÉTUDES

**En vue de l'obtention du Diplôme de Licence Appliquée en Technologies de l'Informatique**

### Sujet :
## Conception et Réalisation d'une Application Web de Gestion de Stock et de Catalogue Produits

**Réalisé par :** [Votre Nom et Prénom]  
**Encadré par :** [Nom de votre Encadrant(e)]  

**Année Universitaire : 2025 / 2026**

---

## TABLE DES MATIÈRES

1. [RÉSUMÉ / ABSTRACT](#resume)
2. [GLOSSAIRE](#glossaire)
3. [REMERCIEMENTS](#remerciements)
4. [INTRODUCTION GÉNÉRALE](#introduction)
... (reste de la table des matières)

---

<a name="resume"></a>
## RÉSUMÉ / ABSTRACT

**Résumé (Français) :**
Ce projet consiste en la conception et la réalisation d'une application web de gestion de stock pour une entreprise commerciale. L'application permet de centraliser la gestion des produits, des catégories et des utilisateurs. Elle offre des fonctionnalités avancées telles que le suivi en temps réel des quantités, le calcul automatique des marges bénéficiaires et un système d'alertes visuelles pour les stocks faibles ou en rupture. Développée avec le framework Laravel 12 et PostgreSQL, la solution garantit sécurité, performance et évolutivité.

**Mots-clés :** Gestion de Stock, Laravel, PostgreSQL, MVC, Application Web, Automatisation.

**Abstract (English):**
This project involves the design and implementation of a web-based stock management application for a commercial enterprise. The application centralizes the management of products, categories, and users. It provides advanced features such as real-time quantity tracking, automatic profit margin calculation, and a visual alert system for low or out-of-stock items. Developed using the Laravel 12 framework and PostgreSQL, the solution ensures security, performance, and scalability.

**Keywords:** Stock Management, Laravel, PostgreSQL, MVC, Web Application, Automation.

---

<a name="glossaire"></a>
## GLOSSAIRE

- **MVC (Modèle-Vue-Contrôleur)** : Architecture logicielle séparant la logique de données, l'interface utilisateur et la logique de contrôle.
- **ORM (Object-Relational Mapping)** : Technique permettant d'interagir avec une base de données en utilisant des objets plutôt que des requêtes SQL brutes (ex: Eloquent dans Laravel).
- **Framework** : Ensemble d'outils et de bibliothèques facilitant le développement d'applications logicielles.
- **Responsive Design** : Approche de conception permettant à une interface de s'adapter automatiquement à la taille de l'écran (mobile, tablette, PC).
- **Middleware** : Code qui s'exécute entre la requête entrante et la réponse sortante, souvent utilisé pour la sécurité ou l'authentification.
- **Vite.js** : Outil de construction (build tool) moderne qui accélère le développement frontend.

---

<a name="remerciements"></a>
## REMERCIEMENTS

Je tiens à exprimer ma profonde reconnaissance à l'ensemble du corps professoral de l'**ISET Nabeul** pour leur dévouement et la qualité de l'enseignement prodigué.

Un remerciement particulier à mon encadrant(e) pour son soutien, sa patience et ses conseils techniques tout au long de ce projet.

Enfin, je remercie ma famille et mes amis qui m'ont soutenu durant tout mon cursus universitaire.

---

<a name="introduction"></a>
## INTRODUCTION GÉNÉRALE

À l'ère de la transformation numérique, la gestion manuelle des ressources est devenue un obstacle majeur à la performance des entreprises. La gestion des stocks, en particulier, demande une précision rigoureuse pour éviter les ruptures de stock qui nuisent aux ventes ou le surstockage qui immobilise inutilement de la trésorerie.

C'est dans cette optique que s'inscrit notre Projet de Fin d'Études intitulé **« Conception et Réalisation d'une Application Web de Gestion de Stock »**. Cette solution vise à offrir un outil moderne, sécurisé et intuitif pour automatiser le suivi des produits, des catégories et des utilisateurs au sein d'une structure commerciale.

Ce rapport détaille les phases de cycle de vie du projet, de l'analyse conceptuelle jusqu'à l'implémentation technique sous le framework Laravel.

---

<a name="chapitre1"></a>
## CHAPITRE 1 : PRÉSENTATION DU PROJET

### 1.1 Cadre du projet
Ce projet est réalisé dans le cadre de l'obtention de la Licence Appliquée en Technologies de l'Informatique à l'ISET Nabeul. Il consiste à concevoir une application de type ERP (Enterprise Resource Planning) simplifiée.

### 1.2 Problématique
La gestion classique par tableurs (Excel) ou registres papier pose plusieurs problèmes :
- **Manque de traçabilité** : Difficile de savoir qui a effectué quelle modification.
- **Absence d'alertes** : Le gestionnaire n'est pas prévenu automatiquement lorsque le stock est faible.
- **Erreurs de calcul** : Les marges et les totaux sont calculés manuellement, augmentant le risque d'erreurs financières.

### 1.3 Solution proposée
L'application développée offre :
- Une **gestion par rôles** (Admin et Gestionnaire) pour sécuriser les données.
- Un **système d'alertes visuelles** dynamique basé sur des seuils configurables.
- Une **automatisation des calculs** de marges et de statistiques.

---

<a name="chapitre2"></a>
## CHAPITRE 2 : ANALYSE ET SPÉCIFICATION DES BESOINS

### 2.1 Besoins Fonctionnels
L'application doit permettre aux utilisateurs de :
- **S'authentifier** de manière sécurisée.
- **Gérer les utilisateurs** (Admin uniquement) : ajout, modification, activation/désactivation.
- **Gérer le catalogue** : créer des catégories de produits.
- **Gérer les produits** : suivi des références, prix d'achat/vente, quantités et images.
- **Visualiser l'état du stock** : identification immédiate des produits en rupture.

### 2.2 Besoins Non-Fonctionnels
- **Sécurité** : Hachage des mots de passe (BCRYPT) et protection contre les attaques CSRF/XSS.
- **Convivialité** : Interface épurée et moderne utilisant Tailwind CSS.
- **Disponibilité** : L'application doit être accessible via un navigateur web standard.

---

<a name="chapitre3"></a>
## CHAPITRE 3 : CONCEPTION ET ARCHITECTURE

### 3.1 Architecture MVC
Nous avons utilisé le framework Laravel qui repose sur le pattern **Modèle-Vue-Contrôleur** :
- **Modèles (Eloquent ORM)** : Représentent les tables `users`, `products` et `categories`.
- **Vues (Blade Engine)** : Génèrent le code HTML dynamique côté serveur.
- **Contrôleurs** : Gèrent la logique entre les données et l'affichage.

### 3.2 Modèle de Données
La structure de la base de données PostgreSQL est optimisée :
- **Product** : lié à une **Category** (relation 1-N).
- **User** : possède un attribut `role` qui définit ses permissions.

### 3.3 Logique Métier Intégrée
Une particularité de notre conception est l'intégration de la logique directement dans les modèles. Par exemple, le modèle `Product` contient une méthode `getStatutStockAttribute()` qui retourne dynamiquement l'état (Disponible, Faible, Rupture) avec une couleur associée.

---

<a name="chapitre4"></a>
## CHAPITRE 4 : RÉALISATION ET ENVIRONNEMENT

### 4.1 Technologies utilisées
- **Framework Backend** : Laravel 12.0 (PHP 8.2).
- **Frontend** : Tailwind CSS v4, Vite, Blade.
- **Base de données** : PostgreSQL.
- **Outils** : Git, Composer, NPM, VS Code.

### 4.2 Interfaces de l'application
L'application dispose de plusieurs interfaces clés :
1. **Dashboard** : Affiche les statistiques globales et les alertes urgentes.
2. **Gestion des Produits** : Un tableau dynamique avec filtrage par catégorie.
3. **Profil Utilisateur** : Permet à chaque employé de gérer ses informations personnelles.

---

<a name="conclusion"></a>
## CONCLUSION ET PERSPECTIVES

Ce projet a été une opportunité majeure pour mettre en pratique les technologies de pointe du Web. Nous avons abouti à une application fonctionnelle qui résout les problèmes critiques de gestion de stock identifiés.

**Perspectives :**
- Ajout d'un module de **statistiques graphiques** (Chart.js) pour visualiser l'évolution des stocks.
- Génération de **rapports PDF** automatiques pour les inventaires mensuels.
- Intégration d'une **API** pour connecter l'application à un lecteur de code-barres mobile.

***
**© 2026 - Projet de Fin d'Études - ISET Nabeul**
