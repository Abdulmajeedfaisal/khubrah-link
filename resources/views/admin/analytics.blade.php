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
                    <h3 class="text-sm font-semibold opacity-90">معدل النمو</h3>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold mb-2">{{ $keyMetrics['growth_rate'] > 0 ? '+' : '' }}{{ $keyMetrics['growth_rate'] }}%</p>
                <p class="text-sm opacity-80">مقارنة بالفترة السابقة</p>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold opacity-90">معدل الاحتفاظ</h3>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold mb-2">{{ $keyMetrics['retention_rate'] }}%</p>
                <p class="text-sm opacity-80">من المستخدمين النشطين</p>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold opacity-90">متوسط الجلسات</h3>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold mb-2">{{ $keyMetrics['avg_sessions_per_user'] }}</p>
                <p class="text-sm opacity-80">جلسة لكل مستخدم</p>
            </div>

            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg p-6 text-white relative">
                <span class="absolute top-2 left-2 text-xs bg-yellow-500 px-2 py-1 rounded-full">قريباً</span>
                <div class="flex items-center justify-between mb-4 opacity-60">
                    <h3 class="text-sm font-semibold opacity-90">معدل الرضا</h3>
                    <svg class="w-8 h-8 opacity-80" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold mb-2 opacity-60">--</p>
                <p class="text-sm opacity-60">الإصدار الثاني</p>
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
                    @forelse($topSkills->take(5) as $index => $skill)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-{{ ['blue', 'green', 'purple', 'orange', 'pink'][$index % 5] }}-100 dark:bg-{{ ['blue', 'green', 'purple', 'orange', 'pink'][$index % 5] }}-900/30 rounded-lg flex items-center justify-center">
                                <span class="text-lg font-bold text-{{ ['blue', 'green', 'purple', 'orange', 'pink'][$index % 5] }}-600 dark:text-{{ ['blue', 'green', 'purple', 'orange', 'pink'][$index % 5] }}-400">
                                    {{ $index + 1 }}
                                </span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ $skill->title }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $skill->category->name_ar ?? 'غير محدد' }}</p>
                            </div>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">{{ $skill->sessions_count }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">جلسة</p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        <p>لا توجد بيانات</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Top Providers -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">أفضل مقدمي الخدمات</h3>
                <div class="space-y-4">
                    @forelse($topProviders->take(5) as $provider)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                {{ mb_substr($provider->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ $provider->name }}</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">قريباً</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">{{ $provider->teaching_sessions_count }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">جلسة</p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        <p>لا توجد بيانات</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Activity Heatmap -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">خريطة النشاط الأسبوعية</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">عدد الجلسات حسب اليوم والساعة</p>
            
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <!-- Hours Header -->
                    <div class="flex items-center mb-2">
                        <div class="w-20 flex-shrink-0"></div>
                        <div class="flex gap-1">
                            @for($hour = 0; $hour < 24; $hour++)
                            <div class="w-8 text-center">
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $hour }}</span>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Heatmap Grid -->
                    @foreach($weeklyHeatmap as $dayIndex => $dayData)
                    <div class="flex items-center mb-1">
                        <div class="w-20 flex-shrink-0">
                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ $dayData['day'] }}</span>
                        </div>
                        <div class="flex gap-1">
                            @foreach($dayData['hours'] as $hour => $count)
                            @php
                                $maxCount = max(array_map(function($d) { 
                                    return max($d['hours']); 
                                }, $weeklyHeatmap));
                                
                                $intensity = $maxCount > 0 ? ($count / $maxCount) : 0;
                                
                                if ($count == 0) {
                                    $bgColor = 'bg-gray-100 dark:bg-slate-700';
                                } elseif ($intensity <= 0.25) {
                                    $bgColor = 'bg-green-200 dark:bg-green-900/40';
                                } elseif ($intensity <= 0.5) {
                                    $bgColor = 'bg-green-300 dark:bg-green-800/60';
                                } elseif ($intensity <= 0.75) {
                                    $bgColor = 'bg-green-400 dark:bg-green-700/80';
                                } else {
                                    $bgColor = 'bg-green-500 dark:bg-green-600';
                                }
                                
                                // تنسيق الوقت
                                $hourFormatted = $hour == 0 ? '12:00 صباحاً' : 
                                                ($hour < 12 ? $hour . ':00 صباحاً' : 
                                                ($hour == 12 ? '12:00 ظهراً' : 
                                                ($hour - 12) . ':00 مساءً'));
                            @endphp
                            <div class="w-8 h-8 {{ $bgColor }} rounded transition-all hover:ring-2 hover:ring-primary-500 cursor-pointer group relative">
                                <!-- Tooltip - يظهر في الأسفل للصف الأول، وفي الأعلى لبقية الصفوف -->
                                <div class="absolute {{ $dayIndex == 0 ? 'top-full mt-2' : 'bottom-full mb-2' }} left-1/2 -translate-x-1/2 hidden group-hover:block z-40 pointer-events-none">
                                    <div class="bg-gray-900 text-white text-xs rounded py-1.5 px-2.5 whitespace-nowrap shadow-xl">
                                        <div class="text-center font-semibold">{{ $dayData['day'] }} - {{ $hourFormatted }}</div>
                                        @if($count > 0)
                                        <div class="text-green-400 text-center font-bold">{{ $count }} {{ $count == 1 ? 'جلسة' : 'جلسات' }}</div>
                                        @else
                                        <div class="text-gray-400 text-center">لا توجد جلسات</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                    <!-- Legend -->
                    <div class="flex items-center gap-4 mt-6 pt-4 border-t border-gray-200 dark:border-slate-700">
                        <span class="text-sm text-gray-600 dark:text-gray-400">أقل</span>
                        <div class="flex gap-1">
                            <div class="w-6 h-6 bg-gray-100 dark:bg-slate-700 rounded"></div>
                            <div class="w-6 h-6 bg-green-200 dark:bg-green-900/40 rounded"></div>
                            <div class="w-6 h-6 bg-green-300 dark:bg-green-800/60 rounded"></div>
                            <div class="w-6 h-6 bg-green-400 dark:bg-green-700/80 rounded"></div>
                            <div class="w-6 h-6 bg-green-500 dark:bg-green-600 rounded"></div>
                        </div>
                        <span class="text-sm text-gray-600 dark:text-gray-400">أكثر</span>
                        
                        <div class="mr-auto flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-xs text-gray-500 dark:text-gray-400">مرر الماوس على المربعات لمزيد من التفاصيل</span>
                        </div>
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
