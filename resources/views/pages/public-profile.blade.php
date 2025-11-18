<!DOCTYPE html>
<html lang="ar" dir="rtl" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $user->name }} - خبرة لينك</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-cairo antialiased bg-gray-50 dark:bg-slate-900">
    <!-- Navbar -->
    <x-navbar />

    <!-- Profile Header -->
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-5xl shadow-xl">
                    {{ mb_substr($user->name, 0, 1) }}
                </div>
                
                <div class="flex-1 text-center md:text-right">
                    <h1 class="text-4xl font-bold text-white mb-2">{{ $user->name }}</h1>
                    @if($user->bio)
                        <p class="text-blue-100 text-lg mb-4">{{ Str::limit($user->bio, 100) }}</p>
                    @endif

                    <div class="flex items-center justify-center md:justify-start gap-6 mb-4">
                        <div>
                            <div class="text-2xl font-bold text-white">{{ number_format($stats['average_rating'], 1) }}</div>
                            <div class="text-sm text-blue-100">التقييم</div>
                        </div>
                        <div class="w-px h-12 bg-blue-400"></div>
                        <div>
                            <div class="text-2xl font-bold text-white">{{ $stats['total_sessions'] }}</div>
                            <div class="text-sm text-blue-100">جلسة</div>
                        </div>
                        <div class="w-px h-12 bg-blue-400"></div>
                        <div>
                            <div class="text-2xl font-bold text-white">{{ $stats['total_skills'] }}</div>
                            <div class="text-sm text-blue-100">مهارة</div>
                        </div>
                    </div>

                    @auth
                        @if($user->id !== auth()->id())
                            <div class="flex items-center justify-center md:justify-start gap-3 mb-6">
                                @if($skills->count() > 0)
                                    <a href="{{ route('sessions.book', $user) }}" class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold rounded-lg transition">
                                        احجز جلسة
                                    </a>
                                @endif
                                <a href="{{ route('messages.show', $user) }}" class="px-6 py-3 bg-white/20 hover:bg-white/30 text-white font-medium rounded-lg transition">
                                    أرسل رسالة
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="flex items-center justify-center md:justify-start gap-3 mb-6">
                            <a href="{{ route('login') }}" class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold rounded-lg transition">
                                سجل دخول للحجز
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- About -->
                @if($user->bio)
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">نبذة عني</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">{{ $user->bio }}</p>
                </div>
                @endif

                <!-- Skills -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">المهارات التي أقدمها ({{ $skills->count() }})</h2>
                    
                    @if($skills->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($skills as $skill)
                                <a href="{{ route('skills.show', $skill) }}" class="border border-gray-200 dark:border-slate-700 rounded-lg p-4 hover:border-primary-500 dark:hover:border-primary-500 hover:shadow-md transition group">
                                    <div class="flex items-start justify-between mb-2">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition">
                                            {{ $skill->title }}
                                        </h3>
                                        @if($skill->price_per_hour)
                                            <span class="text-sm font-bold text-primary-600 dark:text-primary-400">
                                                {{ number_format($skill->price_per_hour) }} ر.س
                                            </span>
                                        @else
                                            <span class="text-sm font-bold text-green-600 dark:text-green-400">مجاناً</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">{{ $skill->description }}</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs rounded">
                                            {{ $skill->category->name_ar }}
                                        </span>
                                        <span class="px-2 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs rounded">
                                            {{ $skill->level_arabic }}
                                        </span>
                                        <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs rounded">
                                            {{ $skill->session_type_arabic }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-4 mt-3 text-sm text-gray-600 dark:text-gray-400">
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span>{{ number_format($skill->average_rating, 1) }}</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                            </svg>
                                            <span>{{ $skill->total_sessions }} جلسة</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-gray-600 dark:text-gray-400">لا توجد مهارات متاحة حالياً</p>
                        </div>
                    @endif
                </div>

                <!-- Reviews -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">التقييمات ({{ $stats['total_reviews'] }})</h2>
                    
                    @if($reviews->count() > 0)
                        <div class="space-y-6">
                            @foreach($reviews as $review)
                                <div class="flex gap-4 pb-6 border-b border-gray-200 dark:border-slate-700 last:border-0 last:pb-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                        {{ mb_substr($review->reviewer->name, 0, 1) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-start justify-between mb-2">
                                            <div>
                                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $review->reviewer->name }}</h4>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $review->session->skill->title }}</p>
                                            </div>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="flex items-center gap-1 mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $review->overall_rating ? 'text-yellow-400 fill-current' : 'text-gray-300 dark:text-gray-600' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        @if($review->comment)
                                            <p class="text-gray-700 dark:text-gray-300">{{ $review->comment }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if($reviews->hasPages())
                            <div class="mt-6">
                                {{ $reviews->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            <p class="text-gray-600 dark:text-gray-400">لا توجد تقييمات بعد</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="space-y-6">
                <!-- User Info -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold text-gray-900 dark:text-white mb-4">معلومات</h3>
                    <div class="space-y-3 text-sm">
                        @if($user->location)
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ $user->location }}</span>
                            </div>
                        @endif
                        <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>انضم {{ $user->created_at->translatedFormat('F Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold text-gray-900 dark:text-white mb-4">الإحصائيات</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">معدل التقييم</span>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="font-bold text-gray-900 dark:text-white">{{ number_format($stats['average_rating'], 1) }}</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">الجلسات المكتملة</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $stats['total_sessions'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">عدد المهارات</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $stats['total_skills'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">عدد التقييمات</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $stats['total_reviews'] }}</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <x-footer />
</body>
</html>
