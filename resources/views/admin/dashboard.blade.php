<x-admin-layout>
    <x-slot name="header">لوحة التحكم الرئيسية</x-slot>

    <div class="space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Users -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">إجمالي المستخدمين</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ number_format($usersStats['total']) }}</p>
                        <p class="text-sm text-green-600 dark:text-green-400 mt-2">
                            <span class="font-semibold">+{{ $usersStats['new_this_month'] }}</span> هذا الشهر
                        </p>
                    </div>
                    <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Sessions -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">الجلسات النشطة</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ number_format($sessionsStats['confirmed']) }}</p>
                        <p class="text-sm text-green-600 dark:text-green-400 mt-2">
                            <span class="font-semibold">{{ $sessionsStats['today'] }}</span> اليوم
                        </p>
                    </div>
                    <div class="w-14 h-14 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Categories -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">فئات المهارات</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ number_format($categoriesStats['total']) }}</p>
                        <p class="text-sm text-blue-600 dark:text-blue-400 mt-2">
                            <span class="font-semibold">{{ $skillsStats['total'] }}</span> مهارة مسجلة
                        </p>
                    </div>
                    <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Reports (Coming Soon) -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 relative overflow-hidden">
                <div class="absolute top-2 left-2">
                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 text-xs font-bold rounded-full">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        قريباً
                    </span>
                </div>
                <div class="flex items-center justify-between opacity-60">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">البلاغات</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">--</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                            الإصدار الثاني
                        </p>
                    </div>
                    <div class="w-14 h-14 bg-gray-100 dark:bg-slate-700 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- User Growth Chart -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">نمو المستخدمين (آخر 7 أيام)</h3>
                <div style="height: 300px;">
                    <canvas id="usersChart"></canvas>
                </div>
            </div>

            <!-- Sessions Chart -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">الجلسات (آخر 7 أيام)</h3>
                <div style="height: 300px;">
                    <canvas id="sessionsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Quick Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Users -->
            <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
                <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">المستخدمون الجدد</h3>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-slate-700">
                    @forelse($recentUsers as $user)
                    <div class="p-4 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ mb_substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $user->name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="text-left">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->created_at->diffForHumans() }}</p>
                                <span class="inline-block px-2 py-1 text-xs font-semibold {{ $user->is_active ? 'text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30' : 'text-gray-600 dark:text-gray-400 bg-gray-100 dark:bg-gray-900/30' }} rounded-full">
                                    {{ $user->is_active ? 'نشط' : 'غير نشط' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                        <p>لا يوجد مستخدمون جدد</p>
                    </div>
                    @endforelse
                </div>
                <div class="p-4 border-t border-gray-200 dark:border-slate-700">
                    <a href="{{ route('admin.users.index') }}" class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-semibold text-sm">
                        عرض جميع المستخدمين ←
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">إجراءات سريعة</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <span class="font-semibold">إدارة المستخدمين</span>
                    </a>

                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        <span class="font-semibold">إدارة الفئات</span>
                    </a>

                    <a href="{{ route('admin.skills.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        <span class="font-semibold">إدارة المهارات</span>
                    </a>

                    <a href="{{ route('admin.sessions.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span class="font-semibold">مراقبة الجلسات</span>
                    </a>

                    <a href="{{ route('admin.analytics') }}" class="flex items-center gap-3 p-3 rounded-lg bg-orange-50 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 hover:bg-orange-100 dark:hover:bg-orange-900/30 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span class="font-semibold">عرض التحليلات</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">حالة النظام</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">حالة الخادم</p>
                        <p class="font-bold text-gray-900 dark:text-white">نشط</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">قاعدة البيانات</p>
                        <p class="font-bold text-gray-900 dark:text-white">متصلة</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">مساحة التخزين</p>
                        <p class="font-bold text-gray-900 dark:text-white">68% مستخدمة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <script>
        // Chart Configuration
        const chartColors = {
            primary: 'rgb(59, 130, 246)',
            success: 'rgb(34, 197, 94)',
            warning: 'rgb(251, 146, 60)',
            danger: 'rgb(239, 68, 68)',
            info: 'rgb(168, 85, 247)',
        };

        // Chart Data from Backend
        const chartData = @json($last7Days);
        const labels = chartData.map(item => item.date_ar);
        const usersData = chartData.map(item => item.users);
        const sessionsData = chartData.map(item => item.sessions);

        // Users Growth Chart
        const usersCtx = document.getElementById('usersChart').getContext('2d');
        new Chart(usersCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'مستخدمون جدد',
                    data: usersData,
                    borderColor: chartColors.primary,
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: chartColors.primary,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: {
                            font: {
                                family: 'Cairo, sans-serif',
                                size: 12
                            },
                            usePointStyle: true,
                            padding: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            family: 'Cairo, sans-serif',
                            size: 14
                        },
                        bodyFont: {
                            family: 'Cairo, sans-serif',
                            size: 13
                        },
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + ' مستخدم';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            font: {
                                family: 'Cairo, sans-serif'
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                family: 'Cairo, sans-serif'
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Sessions Activity Chart
        const sessionsCtx = document.getElementById('sessionsChart').getContext('2d');
        new Chart(sessionsCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'جلسات جديدة',
                    data: sessionsData,
                    backgroundColor: 'rgba(34, 197, 94, 0.8)',
                    borderColor: chartColors.success,
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: {
                            font: {
                                family: 'Cairo, sans-serif',
                                size: 12
                            },
                            usePointStyle: true,
                            padding: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            family: 'Cairo, sans-serif',
                            size: 14
                        },
                        bodyFont: {
                            family: 'Cairo, sans-serif',
                            size: 13
                        },
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + ' جلسة';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            font: {
                                family: 'Cairo, sans-serif'
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                family: 'Cairo, sans-serif'
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
    @endpush
</x-admin-layout>
