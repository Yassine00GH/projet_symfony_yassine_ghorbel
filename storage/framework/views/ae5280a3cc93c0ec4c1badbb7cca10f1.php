<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Authentification'); ?> - <?php echo e(config('app.name')); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 font-sans antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8">
        <!-- Logo & Titre -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl shadow-lg mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900"><?php echo e(config('app.name')); ?></h1>
            <p class="text-gray-600 mt-2">Système de gestion de stock pour boutique</p>
        </div>

        <!-- Contenu -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 animate-fade-in">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <p class="text-center text-gray-500 text-sm mt-8">
            © <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?> - Projet PFE
        </p>
    </div>
</body>
</html>
<?php /**PATH C:\Users\MSI\Desktop\projet cote serveur\stock-management\resources\views/layouts/guest.blade.php ENDPATH**/ ?>