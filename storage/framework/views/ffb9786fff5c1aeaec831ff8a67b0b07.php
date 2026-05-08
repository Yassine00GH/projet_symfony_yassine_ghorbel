

<?php $__env->startSection('title', 'Tableau de bord'); ?>
<?php $__env->startSection('page-title', 'Tableau de bord Administrateur'); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 text-white">
        <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs uppercase tracking-wider font-semibold text-blue-100">Total Produits</p>
                    <p class="text-4xl font-extrabold mt-1"><?php echo e(number_format($stats['total_products'])); ?></p>
                </div>
                <div class="p-3 bg-white/20 backdrop-blur-md rounded-xl">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-blue-100">
                <span class="bg-blue-100/20 px-2 py-0.5 rounded-full">+<?php echo e($stats['total_products'] > 0 ? 'Actif' : 'N/A'); ?></span>
                <span class="ml-2 font-medium">Catalogue complet</span>
            </div>
        </div>

        <div class="relative overflow-hidden bg-gradient-to-br from-purple-600 to-pink-700 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs uppercase tracking-wider font-semibold text-purple-100">Catégories</p>
                    <p class="text-4xl font-extrabold mt-1"><?php echo e($stats['total_categories']); ?></p>
                </div>
                <div class="p-3 bg-white/20 backdrop-blur-md rounded-xl">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-purple-100">
                <span class="bg-purple-100/20 px-2 py-0.5 rounded-full">Secteurs</span>
                <span class="ml-2 font-medium">Structure du stock</span>
            </div>
        </div>

        <div class="relative overflow-hidden bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs uppercase tracking-wider font-semibold text-orange-100">Alertes</p>
                    <p class="text-4xl font-extrabold mt-1 text-white"><?php echo e($stats['stock_faible']); ?></p>
                </div>
                <div class="p-3 bg-white/20 backdrop-blur-md rounded-xl">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-orange-100">
                <span class="bg-orange-100/20 px-2 py-0.5 rounded-full">Urgence moyenne</span>
                <span class="ml-2 font-medium">Réapprovisionnement</span>
            </div>
        </div>

        <div class="relative overflow-hidden bg-gradient-to-br from-rose-600 to-red-700 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs uppercase tracking-wider font-semibold text-rose-100">En Rupture</p>
                    <p class="text-4xl font-extrabold mt-1"><?php echo e($stats['rupture_stock']); ?></p>
                </div>
                <div class="p-3 bg-white/20 backdrop-blur-md rounded-xl">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-rose-100">
                <span class="bg-rose-100/20 px-2 py-0.5 rounded-full">Urgence élevée</span>
                <span class="ml-2 font-medium">Action immédiate</span>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8">
        
        <div class="lg:col-span-4 bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-gray-800 text-lg">Santé du Stock</h3>
                <span class="text-xs font-semibold px-2 py-1 bg-green-100 text-green-700 rounded-lg italic">Temps réel</span>
            </div>
            <div id="healthGauge" class="min-h-[300px]"></div>
            <div class="mt-4 grid grid-cols-3 gap-2 text-center text-xs">
                <div class="p-2 rounded-xl bg-green-50">
                    <p class="text-gray-500 mb-1">OK</p>
                    <p class="font-bold text-green-600"><?php echo e($stockStatusData['disponible']); ?></p>
                </div>
                <div class="p-2 rounded-xl bg-orange-50">
                    <p class="text-gray-500 mb-1">Warning</p>
                    <p class="font-bold text-orange-600"><?php echo e($stockStatusData['alerte']); ?></p>
                </div>
                <div class="p-2 rounded-xl bg-red-50">
                    <p class="text-gray-500 mb-1">Rupture</p>
                    <p class="font-bold text-red-600"><?php echo e($stockStatusData['rupture']); ?></p>
                </div>
            </div>
        </div>

        
        <div class="lg:col-span-8 bg-white p-6 rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Performance & Valeurs</h3>
                    <p class="text-sm text-gray-500">Comparaison Achat vs Vente Potentielle</p>
                </div>
                <div class="flex items-center gap-4 bg-gray-50 p-2 rounded-2xl">
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                        <span class="text-xs font-medium text-gray-600">Achat</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-emerald-500 rounded-full mr-2"></span>
                        <span class="text-xs font-medium text-gray-600">Vente</span>
                    </div>
                </div>
            </div>
            <div id="financialChart" class="min-h-[350px]"></div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-gray-800 text-lg mb-6">Top 5 Produits (Valeur)</h3>
            <div id="topProductsChart" class="min-h-[300px]"></div>
        </div>

        
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-gray-800 text-lg mb-6">Volume par Catégorie</h3>
            <div id="categoriesChart" class="min-h-[300px]"></div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-bold text-gray-800 flex items-center">
                    <span class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center mr-3">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                    Alertes de stock critiques
                </h3>
                <span class="text-xs font-bold text-orange-500 uppercase px-2 py-1 bg-orange-50 rounded-lg">Action demandée</span>
            </div>
            <div class="overflow-x-auto p-4">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase tracking-wider">
                            <th class="px-4 py-3 font-semibold">Produit</th>
                            <th class="px-4 py-3 font-semibold">Stock</th>
                            <th class="px-4 py-3 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php $__empty_1 = true; $__currentLoopData = $produitsAlerte; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-4 py-4">
                                    <div class="font-bold text-gray-800"><?php echo e($p->nom); ?></div>
                                    <div class="text-xs text-gray-400 font-medium"><?php echo e($p->category->nom ?? '-'); ?></div>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center">
                                        <span class="text-sm font-black text-gray-800"><?php echo e($p->quantite); ?></span>
                                        <span class="text-xs text-gray-400 mx-1">/</span>
                                        <span class="text-xs text-gray-400"><?php echo e($p->seuil_alerte); ?></span>
                                    </div>
                                    <div class="w-16 bg-gray-100 h-1 rounded-full mt-1">
                                        <div class="bg-orange-500 h-1 rounded-full" style="width: <?php echo e(min(100, ($p->quantite / max(1, $p->seuil_alerte)) * 100)); ?>%"></div>
                                    </div>
                                </td>
                                <td class="px-4 py-4">
                                    <a href="<?php echo e(route('admin.products.edit', $p)); ?>" class="text-blue-600 hover:text-blue-800 font-bold text-xs uppercase tracking-tighter">Réappro</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center text-gray-400 italic">Tout est sous contrôle !</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
                <h3 class="font-bold text-gray-800 flex items-center">
                    <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mr-3">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span>
                    Flux de produits récents
                </h3>
            </div>
            <div class="overflow-x-auto p-4">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase tracking-wider">
                            <th class="px-4 py-3 font-semibold">Produit</th>
                            <th class="px-4 py-3 font-semibold">Référence</th>
                            <th class="px-4 py-3 font-semibold text-right">Réf. Prix</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php $__empty_1 = true; $__currentLoopData = $produitsRecents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-4 py-4 font-bold text-gray-800 text-sm"><?php echo e($p->nom); ?></td>
                                <td class="px-4 py-4 text-xs font-mono text-gray-400"><?php echo e($p->reference); ?></td>
                                <td class="px-4 py-4 text-right text-sm font-black text-emerald-600"><?php echo e(number_format($p->prix_vente, 0)); ?> DT</td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center text-gray-400 italic">Aucun mouvement récent</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head'); ?>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        .apexcharts-canvas {
            margin: 0 auto;
        }
        .apexcharts-tooltip {
            border-radius: 16px !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
            border: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Configuration globale
    const chartColors = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#ec4899'];

    // 1. Santé du Stock (RadialBar)
    new ApexCharts(document.querySelector("#healthGauge"), {
        series: [<?php echo e(round(($stockStatusData['disponible'] / max(1, $stats['total_products'])) * 100)); ?>],
        chart: { height: 300, type: 'radialBar', sparkline: { enabled: true } },
        plotOptions: {
            radialBar: {
                startAngle: -90, endAngle: 90,
                track: { background: "#f3f4f6", strokeWidth: '97%', margin: 5 },
                dataLabels: {
                    name: { show: false },
                    value: { offsetY: -2, fontSize: '28px', fontWeight: '900', color: '#1f2937', formatter: (v) => v + '%' }
                }
            }
        },
        fill: { type: 'gradient', gradient: { shade: 'light', shadeIntensity: 0.4, inverseColors: false, opacityFrom: 1, opacityTo: 1, stops: [0, 50, 53, 91], colorStops: [{ offset: 0, color: '#3b82f6', opacity: 1 }, { offset: 100, color: '#10b981', opacity: 1 }] } },
        labels: ['Disponibilité'],
    }).render();

    // 2. Performance Financière (Area)
    new ApexCharts(document.querySelector("#financialChart"), {
        series: [{
            name: 'Coût Achat',
            data: [0, <?php echo e($stats['valeur_stock'] * 0.4); ?>, <?php echo e($stats['valeur_stock'] * 0.7); ?>, <?php echo e($stats['valeur_stock']); ?>]
        }, {
            name: 'Vente Potentielle',
            data: [0, <?php echo e($stats['valeur_vente'] * 0.5); ?>, <?php echo e($stats['valeur_vente'] * 0.8); ?>, <?php echo e($stats['valeur_vente']); ?>]
        }],
        chart: { type: 'area', height: 350, toolbar: { show: false }, zoom: { enabled: false }, sparkline: { enabled: false } },
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 3 },
        colors: ['#3b82f6', '#10b981'],
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.05, stops: [0, 90, 100] } },
        xaxis: { categories: ['Jan', 'Féb', 'Mar', 'Avr'], labels: { show: false } },
        yaxis: { labels: { formatter: (v) => v + ' DT' } },
        grid: { borderColor: '#f1f1f1', strokeDashArray: 4 },
        tooltip: { y: { formatter: (v) => v.toLocaleString() + ' DT' } }
    }).render();

    // 3. Top Produits (Bar)
    new ApexCharts(document.querySelector("#topProductsChart"), {
        series: [{ data: <?php echo json_encode($topProduitsValeur->pluck('valeur_totale')); ?> }],
        chart: { type: 'bar', height: 300, toolbar: { show: false } },
        plotOptions: { bar: { borderRadius: 8, horizontal: true, distributed: true, barHeight: '60%' } },
        colors: chartColors,
        dataLabels: { enabled: false },
        xaxis: { categories: <?php echo json_encode($topProduitsValeur->pluck('nom')); ?>, labels: { show: false } },
        grid: { show: false }
    }).render();

    // 4. Catégories (Donut)
    new ApexCharts(document.querySelector("#categoriesChart"), {
        series: <?php echo json_encode($repartitionCategories->pluck('products_count')); ?>,
        labels: <?php echo json_encode($repartitionCategories->pluck('nom')); ?>,
        chart: { type: 'donut', height: 300 },
        stroke: { show: false },
        colors: chartColors,
        legend: { position: 'bottom', fontSize: '12px', markers: { radius: 12 } },
        plotOptions: { pie: { donut: { size: '75%', labels: { show: true, total: { show: true, label: 'Produits', color: '#9ca3af' } } } } }
    }).render();
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\MSI\Desktop\projet cote serveur\stock-management\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>