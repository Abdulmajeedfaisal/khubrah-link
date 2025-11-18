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
                فئة: {{ $categories->firstWhere('id', request('category'))->name_ar ?? request('category') }}
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
                            @foreach($categories as $category)
                            <a href="{{ route('skills.index', array_merge(request()->except('category'), ['category' => $category->id])) }}" 
                               class="flex items-center cursor-pointer hover:bg-gray-50 dark:hover:bg-slate-700 p-2 rounded-lg transition {{ request('category') == $category->id ? 'bg-primary-50 dark:bg-primary-900/20' : '' }}">
                                <span class="mr-2 text-sm {{ request('category') == $category->id ? 'text-primary-700 dark:text-primary-300 font-semibold' : 'text-gray-700 dark:text-gray-300' }}">
                                    {{ $category->name_ar }}
                                </span>
                                <span class="mr-auto text-xs text-gray-500">({{ $category->skills()->active()->count() }})</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Location Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">المدينة</h4>
                        <form action="{{ route('skills.index') }}" method="GET">
                            <!-- Preserve existing filters -->
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('mode'))
                                <input type="hidden" name="mode" value="{{ request('mode') }}">
                            @endif
                            
                            <select name="location" onchange="this.form.submit()" class="w-full px-3 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-primary-500 dark:bg-slate-700 dark:text-white text-sm">
                                <option value="">جميع المدن</option>
                                <option value="الرياض" {{ request('location') == 'الرياض' ? 'selected' : '' }}>الرياض</option>
                                <option value="جدة" {{ request('location') == 'جدة' ? 'selected' : '' }}>جدة</option>
                                <option value="الدمام" {{ request('location') == 'الدمام' ? 'selected' : '' }}>الدمام</option>
                                <option value="مكة المكرمة" {{ request('location') == 'مكة المكرمة' ? 'selected' : '' }}>مكة المكرمة</option>
                                <option value="المدينة المنورة" {{ request('location') == 'المدينة المنورة' ? 'selected' : '' }}>المدينة المنورة</option>
                                <option value="الباحة" {{ request('location') == 'الباحة' ? 'selected' : '' }}>الباحة</option>
                                <option value="الطائف" {{ request('location') == 'الطائف' ? 'selected' : '' }}>الطائف</option>
                                <option value="أبها" {{ request('location') == 'أبها' ? 'selected' : '' }}>أبها</option>
                            </select>
                        </form>
                    </div>

                    <!-- Session Type Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">نوع الجلسة</h4>
                        <div class="space-y-2">
                            <a href="{{ route('skills.index', request()->except('mode')) }}" 
                               class="flex items-center cursor-pointer hover:bg-gray-50 dark:hover:bg-slate-700 p-2 rounded-lg transition {{ !request('mode') ? 'bg-primary-50 dark:bg-primary-900/20' : '' }}">
                                <span class="mr-2 text-sm {{ !request('mode') ? 'text-primary-700 dark:text-primary-300 font-semibold' : 'text-gray-700 dark:text-gray-300' }}">
                                    الكل
                                </span>
                            </a>
                            <a href="{{ route('skills.index', array_merge(request()->except('mode'), ['mode' => 'حضوري'])) }}" 
                               class="flex items-center cursor-pointer hover:bg-gray-50 dark:hover:bg-slate-700 p-2 rounded-lg transition {{ request('mode') == 'حضوري' ? 'bg-primary-50 dark:bg-primary-900/20' : '' }}">
                                <span class="mr-2 text-sm {{ request('mode') == 'حضوري' ? 'text-primary-700 dark:text-primary-300 font-semibold' : 'text-gray-700 dark:text-gray-300' }}">
                                    حضوري
                                </span>
                            </a>
                            <a href="{{ route('skills.index', array_merge(request()->except('mode'), ['mode' => 'عن بُعد'])) }}" 
                               class="flex items-center cursor-pointer hover:bg-gray-50 dark:hover:bg-slate-700 p-2 rounded-lg transition {{ request('mode') == 'عن بُعد' ? 'bg-primary-50 dark:bg-primary-900/20' : '' }}">
                                <span class="mr-2 text-sm {{ request('mode') == 'عن بُعد' ? 'text-primary-700 dark:text-primary-300 font-semibold' : 'text-gray-700 dark:text-gray-300' }}">
                                    عن بُعد
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Clear Filters -->
                    @if(request()->hasAny(['search', 'category', 'location', 'mode', 'sort']))
                    <a href="{{ route('skills.index') }}" class="block w-full px-4 py-2 bg-gray-100 dark:bg-slate-700 hover:bg-gray-200 dark:hover:bg-slate-600 text-gray-700 dark:text-gray-300 rounded-lg transition-colors text-sm font-medium text-center">
                        مسح الفلاتر
                    </a>
                    @endif
                </div>
            </aside>

            <!-- Results Grid -->
            <main class="flex-1">
                <!-- Results Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">المهارات المتاحة</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            @if($skills->total() > 0)
                                وجدنا {{ $skills->total() }} مهارة متاحة
                            @else
                                لا توجد مهارات متاحة
                            @endif
                        </p>
                    </div>
                    <form action="{{ route('skills.index') }}" method="GET" class="inline-block">
                        <!-- Preserve existing filters -->
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if(request('location'))
                            <input type="hidden" name="location" value="{{ request('location') }}">
                        @endif
                        @if(request('mode'))
                            <input type="hidden" name="mode" value="{{ request('mode') }}">
                        @endif
                        
                        <select name="sort" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-primary-500 dark:bg-slate-800 dark:text-white">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>الأحدث</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>الأعلى تقييماً</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>السعر: من الأقل للأعلى</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>السعر: من الأعلى للأقل</option>
                        </select>
                    </form>
                </div>

                <!-- Skills Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @forelse($skills as $skill)
                    <!-- Skill Card -->
                    <a href="{{ route('skills.show', $skill) }}" class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-all duration-300 group block">
                        <div class="p-6">
                            <!-- Provider Info -->
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    {{ mb_substr($skill->user->name, 0, 1) }}
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">{{ $skill->user->name }}</h3>
                                    <div class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="font-medium">{{ number_format($skill->average_rating, 1) }}</span>
                                        <span>({{ $skill->total_sessions }} جلسة)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Skill Info -->
                            <div class="mb-4">
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-600 transition-colors">
                                    {{ $skill->title }}
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                    {{ Str::limit($skill->description, 100) }}
                                </p>
                            </div>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-medium rounded">
                                    {{ $skill->category->name_ar }}
                                </span>
                                <span class="px-2 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs font-medium rounded">
                                    {{ $skill->level_arabic }}
                                </span>
                                @if($skill->price_per_hour)
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-medium rounded">
                                        {{ number_format($skill->price_per_hour) }} ر.س/ساعة
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-medium rounded">
                                        مجاناً
                                    </span>
                                @endif
                            </div>

                            <!-- Meta Info -->
                            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ $skill->location ?? 'غير محدد' }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $skill->session_type_arabic }}</span>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="w-full px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors text-center">
                                عرض التفاصيل
                            </div>
                        </div>
                    </a>

                    @empty
                    <!-- Empty State -->
                    <div class="col-span-full">
                        <div class="text-center py-16">
                            <svg class="w-24 h-24 mx-auto text-gray-400 dark:text-gray-600 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">لا توجد مهارات متاحة</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">
                                @if(request()->hasAny(['search', 'category', 'location', 'mode']))
                                    جرب تغيير معايير البحث أو الفلاتر
                                @else
                                    لم يتم إضافة أي مهارات بعد
                                @endif
                            </p>
                            @if(request()->hasAny(['search', 'category', 'location', 'mode']))
                                <a href="{{ route('skills.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition font-semibold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    مسح جميع الفلاتر
                                </a>
                            @endif
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($skills->hasPages())
                <div class="mt-12">
                    {{ $skills->links() }}
                </div>
                @endif
            </main>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />
</body>
</html>
