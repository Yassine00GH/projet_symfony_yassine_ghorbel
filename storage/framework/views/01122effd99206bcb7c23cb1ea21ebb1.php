

<?php $__env->startSection('title', 'Tableau de bord'); ?>
<?php $__env->startSection('page-title', 'Tableau de bord Gestionnaire'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
            <p class="text-sm text-gray-600 font-medium">Total Produits</p>
            <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($stats['total_products']); ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
            <p class="text-sm text-gray-600 font-medium">Catégories</p>
            <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($stats['total_categories']); ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
            <p class="text-sm text-gray-600 font-medium">Stock Faible</p>
            <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($stats['stock_faible']); ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
            <p class="text-sm text-gray-600 font-medium">Rupture</p>
            <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($stats['rupture_stock']); ?></p>
        </div>
    </div>

    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl shadow-sm p-6 text-white mb-6">
        <p class="text-sm font-medium opacity-90">Valeur totale du stock</p>
        <p class="text-4xl font-bold mt-2"><?php echo e(number_format($stats['valeur_stock'], 2, ',', ' ')); ?> <span class="text-xl">DT</span></p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="font-semibold text-gray-800">⚠️ Alertes de stock</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $produitsAlerte; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3">
                                    <div class="font-medium text-gray-800"><?php echo e($p->nom); ?></div>
                                    <div class="text-xs text-gray-500"><?php echo e($p->category->nom ?? '-'); ?></div>
                                </td>
                                <td class="px-6 py-3">
                                    <?php $s = $p->statut_stock; ?>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-<?php echo e($s['color']); ?>-100 text-<?php echo e($s['color']); ?>-800">
                                        <?php echo e($p->quantite); ?> - <?php echo e($s['label']); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="2" class="px-6 py-8 text-center text-gray-500">Aucune alerte</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="font-semibold text-gray-800">🆕 Produits récents</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantité</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $produitsRecents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3">
                                    <div class="font-medium text-gray-800"><?php echo e($p->nom); ?></div>
                                    <div class="text-xs text-gray-500"><?php echo e($p->reference); ?></div>
                                </td>
                                <td class="px-6 py-3 text-sm font-semibold"><?php echo e($p->quantite); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="2" class="px-6 py-8 text-center text-gray-500">Aucun produit</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\MSI\Desktop\projet cote serveur\stock-management\resources\views/gestionnaire/dashboard.blade.php ENDPATH**/ ?>