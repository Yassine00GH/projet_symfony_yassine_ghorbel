

<?php $__env->startSection('title', 'Mot de passe oublié'); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="text-2xl font-bold text-gray-900 mb-1">Mot de passe oublié ?</h2>
    <p class="text-gray-600 text-sm mb-6">
        Saisissez votre email, nous vous enverrons un lien pour réinitialiser votre mot de passe.
    </p>

    <?php if(session('success')): ?>
        <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-800 rounded-lg text-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-800 rounded-lg text-sm">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('password.email')); ?>" class="space-y-5">
        <?php echo csrf_field(); ?>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                placeholder="votre@email.com">
        </div>

        <button type="submit"
            class="w-full py-2.5 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-lg shadow-md transition">
            Envoyer le lien de réinitialisation
        </button>
    </form>

    <div class="mt-6 text-center text-sm text-gray-600">
        <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Retour à la connexion
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\MSI\Desktop\projet cote serveur\stock-management\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>