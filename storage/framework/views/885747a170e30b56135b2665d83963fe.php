

<?php $__env->startSection('title', 'Modifier produit'); ?>
<?php $__env->startSection('page-title', 'Modifier le produit'); ?>

<?php $prefix = auth()->user()->isAdmin() ? 'admin' : 'gestionnaire'; ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form method="POST" action="<?php echo e(route($prefix.'.products.update', $product)); ?>" enctype="multipart/form-data" class="space-y-5">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom du produit <span class="text-red-500">*</span></label>
                        <input id="nom" type="text" name="nom" value="<?php echo e(old('nom', $product->nom)); ?>" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="reference" class="block text-sm font-medium text-gray-700 mb-1">Référence <span class="text-red-500">*</span></label>
                        <input id="reference" type="text" name="reference" value="<?php echo e(old('reference', $product->reference)); ?>" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="3"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?php echo e(old('description', $product->description)); ?></textarea>
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie <span class="text-red-500">*</span></label>
                        <select id="category_id" name="category_id" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>" <?php echo e(old('category_id', $product->category_id) == $cat->id ? 'selected' : ''); ?>>
                                    <?php echo e($cat->nom); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image du produit</label>
                        <?php if($product->image): ?>
                            <div class="mb-2">
                                <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="w-24 h-24 rounded-lg object-cover border">
                                <p class="text-xs text-gray-500 mt-1">Image actuelle</p>
                            </div>
                        <?php endif; ?>
                        <input id="image" type="file" name="image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-1 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700">
                    </div>

                    <div>
                        <label for="prix_achat" class="block text-sm font-medium text-gray-700 mb-1">Prix d'achat (DT) <span class="text-red-500">*</span></label>
                        <input id="prix_achat" type="number" step="0.01" min="0" name="prix_achat" value="<?php echo e(old('prix_achat', $product->prix_achat)); ?>" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="prix_vente" class="block text-sm font-medium text-gray-700 mb-1">Prix de vente (DT) <span class="text-red-500">*</span></label>
                        <input id="prix_vente" type="number" step="0.01" min="0" name="prix_vente" value="<?php echo e(old('prix_vente', $product->prix_vente)); ?>" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="quantite" class="block text-sm font-medium text-gray-700 mb-1">Quantité <span class="text-red-500">*</span></label>
                        <input id="quantite" type="number" min="0" name="quantite" value="<?php echo e(old('quantite', $product->quantite)); ?>" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="seuil_alerte" class="block text-sm font-medium text-gray-700 mb-1">Seuil d'alerte <span class="text-red-500">*</span></label>
                        <input id="seuil_alerte" type="number" min="0" name="seuil_alerte" value="<?php echo e(old('seuil_alerte', $product->seuil_alerte)); ?>" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $product->is_active) ? 'checked' : ''); ?>

                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Produit actif</span>
                    </label>
                </div>

                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="<?php echo e(route($prefix.'.products.index')); ?>" class="px-5 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Annuler</a>
                    <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\MSI\Desktop\projet cote serveur\stock-management\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>