<x-admin-layout>
    <x-slot name="header">التحليلات والإحصائيات</x-slot>

    <div class="space-y-6">
        <!-- Time Range Selector -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-4">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">الفترة الزمنية</h3>
                <div class="flex gap-2">
                    <a href="{{ route('admin.analytics', ['days' => 7]) }}" 
                       class="px-4 py-2 rounded-lg font-semibold transition-colors {{ request('days', 30) == 7 ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600' }}">
                        7 أيام
                    </a>
                    <a href="{{ route('admin.analytics', ['days' => 30]) }}" 
                       class="px-4 py-2 rounded-lg font-semibold transition-colors {{ request('days', 30) == 30 ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600' }}">
                        30 يوم
                    </a>
                    <a href="{{ route('admin.analytics', ['days' => 90]) }}" 
                       class="px-4 py-2 rounded-lg font-semibold transition-colors {{ request('days', 30) == 90 ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600' }}">
                        90 يوم
                    </a>
                    <a href="{{ route('admin.analytics', ['days' => 365]) }}" 
                       class="px-4 py-2 rounded-lg font-semibold transition-colors {{ request('days', 30) == 365 ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600' }}">
                        سنة
                    </a>
                </div>
            </div>
        </div>
        <!-- Overview Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold opacity-90">معدل النمو الشهري</h3>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold mb-2">+24.5%</p>
                <p class="text-sm opacity-80">مقارنة بالشهر الماضي</p>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold opacity-90">معدل الاحتفاظ</h3>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold mb-2">87.3%</p>
                <p class="text-sm opacity-80">من المستخدمين النشطين</p>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold opacity-90">متوسط الجلسات</h3>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold mb-2">4.2</p>
                <p class="text-sm opacity-80">جلسة لكل مستخدم شهرياً</p>
            </div>

            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold opacity-90">معدل الرضا</h3>
                    <svg class="w-8 h-8 opacity-80" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold mb-2">4.7/5</p>
                <p class="text-sm opacity-80">متوسط التقييمات</p>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- User Growth -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">نمو المستخدمين (آخر {{ $days }} يوم)</h3>
                <div style="height: 320px;">
                    <canvas id="usersGrowthChart"></canvas>
                </div>
            </div>

            <!-- Sessions Activity -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">نشاط الجلسات (آخر {{ $days }} يوم)</h3>
                <div style="height: 320px;">
                    <canvas id="sessionsActivityChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Top Skills & Top Users -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Top Skills -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">أكثر المهارات طلباً</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Laravel</p>
                                <p class="text-sm text-gray-500">برمجة</p>
                            </div>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">342</p>
                            <p class="text-sm text-gray-500">جلسة</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">UI/UX Design</p>
                                <p class="text-sm text-gray-500">تصميم</p>
                            </div>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">298</p>
                            <p class="text-sm text-gray-500">جلسة</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center text-2xl">🇬🇧</div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">English</p>
                                <p class="text-sm text-gray-500">لغات</p>
                            </div>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">256</p>
                            <p class="text-sm text-gray-500">جلسة</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Providers -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">أفضل مقدمي الخدمات</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">أ</div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">أحمد محمد</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">4.9</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">48</p>
                            <p class="text-sm text-gray-500">جلسة</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">س</div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">سارة علي</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">4.8</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">42</p>
                            <p class="text-sm text-gray-500">جلسة</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center text-white font-bold">م</div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">محمد خالد</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">4.7</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">38</p>
                            <p class="text-sm text-gray-500">جلسة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Heatmap -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">خريطة النشاط الأسبوعية</h3>
            <div class="h-64 flex items-center justify-center text-gray-400">
                <div class="text-center">
                    <svg class="w-20 h-20 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <p class="text-sm">Heatmap سيتم إضافته هنا</p>
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
        const usersGrowth = @json($usersGrowth);
        const sessionsActivity = @json($sessionsActivity);
        
        const labels = usersGrowth.map(item => item.date_ar);
        const usersData = usersGrowth.map(item => item.count);
        const usersCumulative = usersGrowth.map(item => item.cumulative);
        
        const sessionsBooked = sessionsActivity.map(item => item.booked);
        const sessionsCompleted = sessionsActivity.map(item => item.completed);
        const sessionsCancelled = sessionsActivity.map(item => item.cancelled);

        // Users Growth Chart
        const usersGrowthCtx = document.getElementById('usersGrowthChart').getContext('2d');
        new Chart(usersGrowthCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'مستخدمون جدد',
                        data: usersData,
                        borderColor: chartColors.primary,
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    },
                    {
                        label: 'إجمالي المستخدمين',
                        data: usersCumulative,
                        borderColor: chartColors.success,
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.4,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        borderDash: [5, 5],
                    }
                ]
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
                            font: { family: 'Cairo, sans-serif', size: 12 },
                            usePointStyle: true,
                            padding: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: { family: 'Cairo, sans-serif', size: 14 },
                        bodyFont: { family: 'Cairo, sans-serif', size: 13 },
                        displayColors: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            font: { family: 'Cairo, sans-serif' }
                        },
                        grid: { color: 'rgba(0, 0, 0, 0.05)' }
                    },
                    x: {
                        ticks: { font: { family: 'Cairo, sans-serif' } },
                        grid: { display: false }
                    }
                }
            }
        });

        // Sessions Activity Chart
        const sessionsActivityCtx = document.getElementById('sessionsActivityChart').getContext('2d');
        new Chart(sessionsActivityCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'محجوزة',
                        data: sessionsBooked,
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',
                        borderRadius: 6,
                    },
                    {
                        label: 'مكتملة',
                        data: sessionsCompleted,
                        backgroundColor: 'rgba(34, 197, 94, 0.8)',
                        borderRadius: 6,
                    },
                    {
                        label: 'ملغاة',
                        data: sessionsCancelled,
                        backgroundColor: 'rgba(239, 68, 68, 0.8)',
                        borderRadius: 6,
                    }
                ]
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
                            font: { family: 'Cairo, sans-serif', size: 12 },
                            usePointStyle: true,
                            padding: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: { family: 'Cairo, sans-serif', size: 14 },
                        bodyFont: { family: 'Cairo, sans-serif', size: 13 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: false,
                        ticks: {
                            stepSize: 1,
                            font: { family: 'Cairo, sans-serif' }
                        },
                        grid: { color: 'rgba(0, 0, 0, 0.05)' }
                    },
                    x: {
                        stacked: false,
                        ticks: { font: { family: 'Cairo, sans-serif' } },
                        grid: { display: false }
                    }
                }
            }
        });
    </script>
    @endpush
</x-admin-layout>
