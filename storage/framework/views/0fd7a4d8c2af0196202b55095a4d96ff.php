

<?php $__env->startSection('title', 'Utilisateurs'); ?>
<?php $__env->startSection('page-title', 'Gestion des utilisateurs'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-xl shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <form method="GET" class="flex flex-wrap gap-3 flex-1">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                        placeholder="Rechercher par nom ou email..."
                        class="flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <select name="role" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">Tous les rôles</option>
                        <option value="admin" <?php echo e(request('role')==='admin' ? 'selected' : ''); ?>>Administrateur</option>
                        <option value="gestionnaire" <?php echo e(request('role')==='gestionnaire' ? 'selected' : ''); ?>>Gestionnaire</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg">Filtrer</button>
                </form>
                <a href="<?php echo e(route('admin.users.create')); ?>" 
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Nouvel utilisateur
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Utilisateur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Téléphone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rôle</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <div class="flex items-center">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white font-semibold flex items-center justify-center mr-3">
                                        <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                    </div>
                                    <div class="font-medium text-gray-800"><?php echo e($user->name); ?></div>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-sm text-gray-600"><?php echo e($user->email); ?></td>
                            <td class="px-6 py-3 text-sm text-gray-600"><?php echo e($user->telephone ?: '-'); ?></td>
                            <td class="px-6 py-3">
                                <?php if($user->role === 'admin'): ?>
                                    <span class="px-2.5 py-1 text-xs font-semibold bg-purple-100 text-purple-800 rounded-full">Administrateur</span>
                                <?php else: ?>
                                    <span class="px-2.5 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">Gestionnaire</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-3">
                                <?php if($user->is_active): ?>
                                    <span class="px-2.5 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Actif</span>
                                <?php else: ?>
                                    <span class="px-2.5 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">Désactivé</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-3 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg" title="Modifier">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <?php if($user->id !== auth()->id()): ?>
                                        <form method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>" data-confirm="Supprimer cet utilisateur ?" class="inline">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg" title="Supprimer">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="px-6 py-12 text-center text-gray-500">Aucun utilisateur</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($users->hasPages()): ?>
            <div class="px-6 py-4 border-t border-gray-200"><?php echo e($users->links()); ?></div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\MSI\Desktop\projet cote serveur\stock-management\resources\views/admin/users/index.blade.php ENDPATH**/ ?>