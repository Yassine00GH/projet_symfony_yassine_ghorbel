

<?php $__env->startSection('title', 'Détails produit'); ?>
<?php $__env->startSection('page-title', 'Détails du produit'); ?>

<?php $prefix = auth()->user()->isAdmin() ? 'admin' : 'gestionnaire'; ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center">
                    <?php if($product->image): ?>
                        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="w-full h-64 object-cover rounded-lg shadow">
                    <?php else: ?>
                        <div class="w-full h-64 bg-white rounded-lg shadow flex items-center justify-center">
                            <svg class="w-20 h-20 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="md:col-span-2 p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800"><?php echo e($product->nom); ?></h2>
                            <p class="text-sm text-gray-500 font-mono mt-1">Ref: <?php echo e($product->reference); ?></p>
                        </div>
                        <?php $s = $product->statut_stock; ?>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-<?php echo e($s['color']); ?>-100 text-<?php echo e($s['color']); ?>-800">
                            <?php echo e($s['label']); ?>

                        </span>
                    </div>

                    <div class="mb-4">
                        <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 text-xs font-semibold rounded-full">
                            <?php echo e($product->category->nom ?? 'Sans catégorie'); ?>

                        </span>
                    </div>

                    <?php if($product->description): ?>
                        <p class="text-gray-600 mb-6"><?php echo e($product->description); ?></p>
                    <?php endif; ?>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500">Prix d'achat</p>
                            <p class="text-lg font-bold text-gray-800"><?php echo e(number_format($product->prix_achat, 2)); ?> DT</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500">Prix de vente</p>
                            <p class="text-lg font-bold text-blue-600"><?php echo e(number_format($product->prix_vente, 2)); ?> DT</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500">Quantité en stock</p>
                            <p class="text-lg font-bold text-gray-800"><?php echo e($product->quantite); ?></p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500">Marge unitaire</p>
                            <p class="text-lg font-bold text-green-600"><?php echo e(number_format($product->marge, 2)); ?> DT</p>
                        </div>
                    </div>

                    <div class="flex space-x-3">
                        <a href="<?php echo e(route($prefix.'.products.edit', $product)); ?>" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Modifier</a>
                        <a href="<?php echo e(route($prefix.'.products.index')); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\MSI\Desktop\projet cote serveur\stock-management\resources\views/admin/products/show.blade.php ENDPATH**/ ?>