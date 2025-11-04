<!DOCTYPE html>
<html lang="ar" dir="rtl" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>استعراض المهارات - خبرة لينك</title>

    <!-- Cairo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-cairo antialiased bg-gray-50 dark:bg-slate-900">
    <!-- Navbar -->
    <x-navbar />

    <!-- Page Header -->
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 dark:from-primary-700 dark:to-primary-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    استكشف المهارات المتاحة
                </h1>
                <p class="text-xl text-blue-100 mb-8">
                    ابحث عن الخبراء في مجتمعك وتعلم مهارات جديدة
                </p>

                <!-- Search Bar -->
                <div class="max-w-3xl mx-auto">
                    <form action="{{ route('skills.index') }}" method="GET" class="relative">
                        <!-- Preserve existing filters -->
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if(request('location'))
                            <input type="hidden" name="location" value="{{ request('location') }}">
                        @endif
                        @if(request('mode'))
                            <input type="hidden" name="mode" value="{{ request('mode') }}">
                        @endif
                        
                        <input type="text" 
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="ابحث عن مهارة... (مثال: برمجة، تصميم، لغات)"
                               class="w-full px-6 py-4 pr-14 rounded-xl border-2 border-transparent focus:border-yellow-400 focus:ring-4 focus:ring-yellow-400/20 dark:bg-slate-800 dark:text-white text-lg">
                        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Results -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Active Filters -->
        @if(request()->has('search') || request()->has('category') || request()->has('location') || request()->has('mode'))
        <div class="mb-6 flex flex-wrap items-center gap-3">
            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">الفلاتر النشطة:</span>
            
            @if(request('search'))
            <span class="inline-flex items-center gap-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 px-3 py-1.5 rounded-full text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                بحث: {{ request('search') }}
                <a href="{{ route('skills.index', request()->except('search')) }}" class="hover:text-primary-900 dark:hover:text-primary-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            </span>
            @endif
            
            @if(request('category'))
            <span class="inline-flex items-center gap-2 bg-accent-100 dark:bg-accent-900/30 text-accent-700 dark:text-accent-300 px-3 py-1.5 rounded-full text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                فئة: {{ request('category') }}
                <a href="{{ route('skills.index', request()->except('category')) }}" class="hover:text-accent-900 dark:hover:text-accent-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            </span>
            @endif
            
            @if(request('location'))
            <span class="inline-flex items-center gap-2 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 px-3 py-1.5 rounded-full text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                موقع: {{ request('location') }}
                <a href="{{ route('skills.index', request()->except('location')) }}" class="hover:text-green-900 dark:hover:text-green-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            </span>
            @endif
            
            @if(request('mode'))
            <span class="inline-flex items-center gap-2 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 px-3 py-1.5 rounded-full text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                نوع: {{ request('mode') }}
                <a href="{{ route('skills.index', request()->except('mode')) }}" class="hover:text-purple-900 dark:hover:text-purple-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            </span>
            @endif
            
            <a href="{{ route('skills.index') }}" class="text-sm text-red-600 dark:text-red-400 hover:underline font-medium">
                مسح الكل
            </a>
        </div>
        @endif
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <aside class="lg:w-64 flex-shrink-0">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 sticky top-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">تصفية النتائج</h3>

                    <!-- Category Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">الفئة</h4>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <span class="mr-2 text-sm text-gray-700 dark:text-gray-300">التقنية</span>
                                <span class="mr-auto text-xs text-gray-500">(24)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <span class="mr-2 text-sm text-gray-700 dark:text-gray-300">الفنون والحرف</span>
                                <span class="mr-auto text-xs text-gray-500">(18)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <span class="mr-2 text-sm text-gray-700 dark:text-gray-300">اللغات</span>
                                <span class="mr-auto text-xs text-gray-500">(15)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <span class="mr-2 text-sm text-gray-700 dark:text-gray-300">الموسيقى</span>
                                <span class="mr-auto text-xs text-gray-500">(12)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <span class="mr-2 text-sm text-gray-700 dark:text-gray-300">الطبخ</span>
                                <span class="mr-auto text-xs text-gray-500">(10)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Location Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">المدينة</h4>
                        <select class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-primary-500 dark:bg-slate-700 dark:text-white text-sm">
                            <option>جميع المدن</option>
                            <option>الرياض</option>
                            <option>جدة</option>
                            <option>الدمام</option>
                            <option>مكة المكرمة</option>
                            <option>المدينة المنورة</option>
                        </select>
                    </div>

                    <!-- Session Type Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">نوع الجلسة</h4>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="session_type" class="text-primary-600 focus:ring-primary-500">
                                <span class="mr-2 text-sm text-gray-700 dark:text-gray-300">الكل</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="session_type" class="text-primary-600 focus:ring-primary-500">
                                <span class="mr-2 text-sm text-gray-700 dark:text-gray-300">حضوري</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="session_type" class="text-primary-600 focus:ring-primary-500">
                                <span class="mr-2 text-sm text-gray-700 dark:text-gray-300">عن بُعد</span>
                            </label>
                        </div>
                    </div>

                    <!-- Clear Filters -->
                    <button class="w-full px-4 py-2 bg-gray-100 dark:bg-slate-700 hover:bg-gray-200 dark:hover:bg-slate-600 text-gray-700 dark:text-gray-300 rounded-lg transition-colors text-sm font-medium">
                        مسح الفلاتر
                    </button>
                </div>
            </aside>

            <!-- Results Grid -->
            <main class="flex-1">
                <!-- Results Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">المهارات المتاحة</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">وجدنا 89 مهارة متاحة</p>
                    </div>
                    <select class="px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-primary-500 dark:bg-slate-800 dark:text-white">
                        <option>الأحدث</option>
                        <option>الأعلى تقييماً</option>
                        <option>الأقرب</option>
                    </select>
                </div>

                <!-- Skills Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <!-- Skill Card 1 -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-all duration-300 group">
                        <div class="p-6">
                            <!-- Provider Info -->
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    أ
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">أحمد محمد</h3>
                                    <div class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="font-medium">4.9</span>
                                        <span>(24 تقييم)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Skill Info -->
                            <div class="mb-4">
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-600 transition-colors">
                                    تطوير تطبيقات الويب بـ Laravel
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                    تعلم بناء تطبيقات ويب احترافية باستخدام Laravel مع أفضل الممارسات والتقنيات الحديثة
                                </p>
                            </div>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-medium rounded">التقنية</span>
                                <span class="px-2 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs font-medium rounded">متقدم</span>
                            </div>

                            <!-- Meta Info -->
                            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>الرياض</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>حضوري / عن بُعد</span>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <button class="w-full px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors">
                                عرض التفاصيل
                            </button>
                        </div>
                    </div>

                    <!-- Skill Card 2 -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-all duration-300 group">
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    س
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">سارة أحمد</h3>
                                    <div class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="font-medium">5.0</span>
                                        <span>(18 تقييم)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-600 transition-colors">
                                    تصميم واجهات المستخدم UI/UX
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                    تعلم أساسيات ومبادئ تصميم واجهات المستخدم وتجربة المستخدم باستخدام Figma
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-2 py-1 bg-pink-100 dark:bg-pink-900/30 text-pink-700 dark:text-pink-300 text-xs font-medium rounded">التصميم</span>
                                <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-medium rounded">مبتدئ</span>
                            </div>

                            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>جدة</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>عن بُعد فقط</span>
                                </div>
                            </div>

                            <button class="w-full px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors">
                                عرض التفاصيل
                            </button>
                        </div>
                    </div>

                    <!-- Skill Card 3 -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-all duration-300 group">
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    م
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">محمد علي</h3>
                                    <div class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="font-medium">4.7</span>
                                        <span>(32 تقييم)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-600 transition-colors">
                                    تعلم اللغة الإنجليزية - محادثة
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                    حسّن مهاراتك في المحادثة باللغة الإنجليزية من خلال جلسات تفاعلية ممتعة
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-2 py-1 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 text-xs font-medium rounded">اللغات</span>
                                <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 text-xs font-medium rounded">متوسط</span>
                            </div>

                            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>الدمام</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>حضوري / عن بُعد</span>
                                </div>
                            </div>

                            <button class="w-full px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors">
                                عرض التفاصيل
                            </button>
                        </div>
                    </div>

                    <!-- Add more skill cards as needed (duplicate the above structure) -->
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex items-center justify-center gap-2">
                    <button class="px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700 text-gray-700 dark:text-gray-300 transition-colors">
                        السابق
                    </button>
                    <button class="px-4 py-2 bg-primary-600 text-white rounded-lg font-medium">1</button>
                    <button class="px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700 text-gray-700 dark:text-gray-300 transition-colors">2</button>
                    <button class="px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700 text-gray-700 dark:text-gray-300 transition-colors">3</button>
                    <button class="px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700 text-gray-700 dark:text-gray-300 transition-colors">
                        التالي
                    </button>
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />
</body>
</html>
