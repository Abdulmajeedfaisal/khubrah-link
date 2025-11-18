<!DOCTYPE html>
<html lang="ar" dir="rtl" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $skill->title }} - خبرة لينك</title>

    <!-- Cairo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-cairo antialiased bg-gray-50 dark:bg-slate-900">
    <!-- Navbar -->
    <x-navbar />

    <!-- Breadcrumb -->
    <div class="bg-white dark:bg-slate-800 border-b border-gray-200 dark:border-slate-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                <a href="{{ url('/') }}" class="hover:text-primary-600 dark:hover:text-primary-400">الرئيسية</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <a href="{{ route('skills.index') }}" class="hover:text-primary-600 dark:hover:text-primary-400">المهارات</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <a href="{{ route('skills.index', ['category' => $skill->category_id]) }}" class="hover:text-primary-600 dark:hover:text-primary-400">{{ $skill->category->name_ar }}</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <span class="text-gray-900 dark:text-white font-medium">{{ Str::limit($skill->title, 30) }}</span>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Skill Header -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">{{ $skill->title }}</h1>
                            <div class="flex flex-wrap items-center gap-4 text-sm">
                                <div class="flex items-center gap-1">
                                    <svg class="w-5 h-5 text-gray-400 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="font-bold text-gray-400 dark:text-gray-500">--</span>
                                    <span class="text-xs bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 px-1.5 py-0.5 rounded">V2</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span>{{ $skill->total_sessions }} جلسة</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span>{{ number_format($skill->views_count) }} مشاهدة</span>
                                </div>
                            </div>
                        </div>
                        <!-- Share Button -->
                        <button onclick="shareSkill()" class="p-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-medium rounded-full">
                            {{ $skill->category->name_ar }}
                        </span>
                        <span class="px-3 py-1.5 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-sm font-medium rounded-full">
                            {{ $skill->level_arabic }}
                        </span>
                        <span class="px-3 py-1.5 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-sm font-medium rounded-full">
                            {{ $skill->session_type_arabic }}
                        </span>
                        @if($skill->location)
                        <span class="px-3 py-1.5 bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-300 text-sm font-medium rounded-full">
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            {{ $skill->location }}
                        </span>
                        @endif
                    </div>

                    <!-- Description -->
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-3">وصف المهارة</h2>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">{{ $skill->description }}</p>
                    </div>
                </div>

                <!-- Provider Info -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">عن المدرب</h2>
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                            {{ mb_substr($skill->user->name, 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">{{ $skill->user->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-3">{{ $skill->user->bio ?? 'مدرب محترف' }}</p>
                            <div class="flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $skill->user->skills->count() }} مهارة</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span>{{ $skill->user->teachingSessions->count() }} جلسة</span>
                                </div>
                            </div>
                            <a href="{{ route('profile.public', $skill->user) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition font-medium">
                                عرض الملف الشخصي
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <!-- V2 Notice -->
                    <div class="mb-6 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-xl p-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h4 class="font-bold text-yellow-900 dark:text-yellow-200 mb-1">قيد التطوير - الإصدار الثاني</h4>
                                <p class="text-sm text-yellow-800 dark:text-yellow-300">نظام التقييمات الشامل قيد التطوير وسيكون متاحاً قريباً في الإصدار الثاني من المنصة.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-6 opacity-60">
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white">التقييمات</h2>
                    </div>

                    @if($skill->reviews->count() > 0)
                        <!-- Rating Summary -->
                        <div class="bg-gray-50 dark:bg-slate-700/50 rounded-lg p-6 mb-6 opacity-60 pointer-events-none">
                            <div class="flex items-center gap-8">
                                <div class="text-center">
                                    <div class="text-5xl font-bold text-gray-900 dark:text-white mb-2">{{ number_format($skill->average_rating, 1) }}</div>
                                    <div class="flex items-center justify-center gap-1 mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= round($skill->average_rating) ? 'text-yellow-400 fill-current' : 'text-gray-300 dark:text-gray-600' }}" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">{{ $skill->reviews->count() }} تقييم</div>
                                </div>
                                <div class="flex-1">
                                    @foreach([5,4,3,2,1] as $rating)
                                        @php
                                            $count = $skill->reviews->where('overall_rating', $rating)->count();
                                            $percentage = $skill->reviews->count() > 0 ? ($count / $skill->reviews->count()) * 100 : 0;
                                        @endphp
                                        <div class="flex items-center gap-3 mb-2">
                                            <span class="text-sm text-gray-600 dark:text-gray-400 w-12">{{ $rating }} نجوم</span>
                                            <div class="flex-1 h-2 bg-gray-200 dark:bg-slate-600 rounded-full overflow-hidden">
                                                <div class="h-full bg-yellow-400" style="width: {{ $percentage }}%"></div>
                                            </div>
                                            <span class="text-sm text-gray-600 dark:text-gray-400 w-8">{{ $count }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Reviews List -->
                        <div class="space-y-4 opacity-60 pointer-events-none">
                            @foreach($skill->reviews->take(5) as $review)
                                <div class="border-b border-gray-200 dark:border-slate-700 pb-4 last:border-0">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                            {{ mb_substr($review->reviewer->name, 0, 1) }}
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-1">
                                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $review->reviewer->name }}</h4>
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
                                                <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $review->comment }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($skill->reviews->count() > 5)
                            <div class="mt-6 text-center">
                                <button class="text-primary-600 dark:text-primary-400 hover:underline font-medium">
                                    عرض جميع التقييمات ({{ $skill->reviews->count() }})
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8 opacity-60">
                            <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            <p class="text-gray-600 dark:text-gray-400">لا توجد تقييمات بعد</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Booking Card (Sticky) -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-gray-200 dark:border-slate-700 p-6 sticky top-6">
                    <div class="mb-6">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                            @if($skill->price_per_hour)
                                {{ number_format($skill->price_per_hour) }} <span class="text-lg text-gray-600 dark:text-gray-400">ر.س</span>
                            @else
                                <span class="text-green-600 dark:text-green-400">مجاناً</span>
                            @endif
                        </div>
                        @if($skill->price_per_hour)
                            <p class="text-sm text-gray-600 dark:text-gray-400">للساعة الواحدة</p>
                        @endif
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3 text-sm">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-700 dark:text-gray-300">مدة الجلسة: <strong>{{ $skill->session_duration }} دقيقة</strong></span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span class="text-gray-700 dark:text-gray-300">{{ $skill->session_type_arabic }}</span>
                        </div>
                        @if($skill->location)
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ $skill->location }}</span>
                            </div>
                        @endif
                    </div>

                    @auth
                        @if($skill->user_id === auth()->id())
                            <a href="{{ route('skills.manage') }}" class="block w-full px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-lg transition text-center">
                                إدارة المهارة
                            </a>
                        @else
                            <a href="{{ route('sessions.book', ['user' => $skill->user, 'skill_id' => $skill->id]) }}" class="block w-full px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition text-center mb-3">
                                احجز الآن
                            </a>
                            <a href="{{ route('messages.show', $skill->user) }}" class="block w-full px-6 py-3 bg-white dark:bg-slate-700 border-2 border-primary-600 text-primary-600 dark:text-primary-400 font-bold rounded-lg hover:bg-primary-50 dark:hover:bg-slate-600 transition text-center">
                                راسل المدرب
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block w-full px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition text-center">
                            سجل دخول للحجز
                        </a>
                    @endauth

                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-slate-700">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400 mb-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>استرجاع كامل خلال 24 ساعة</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>دعم فني متاح 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Skills -->
        @php
            $relatedSkills = \App\Models\Skill::where('category_id', $skill->category_id)
                ->where('id', '!=', $skill->id)
                ->active()
                ->with(['user', 'category'])
                ->limit(3)
                ->get();
        @endphp

        @if($relatedSkills->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">مهارات مشابهة</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedSkills as $relatedSkill)
                    <a href="{{ route('skills.show', $relatedSkill) }}" class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-all duration-300 group block">
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    {{ mb_substr($relatedSkill->user->name, 0, 1) }}
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">{{ $relatedSkill->user->name }}</h3>
                                    <div class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-gray-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="font-medium text-gray-400">--</span>
                                    </div>
                                </div>
                            </div>

                            <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-600 transition-colors">
                                {{ Str::limit($relatedSkill->title, 50) }}
                            </h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2 mb-4">
                                {{ Str::limit($relatedSkill->description, 80) }}
                            </p>

                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-primary-600 dark:text-primary-400">
                                    @if($relatedSkill->price_per_hour)
                                        {{ number_format($relatedSkill->price_per_hour) }} ر.س
                                    @else
                                        مجاناً
                                    @endif
                                </span>
                                <span class="text-sm text-gray-600 dark:text-gray-400">{{ $relatedSkill->session_type_arabic }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- Footer -->
    <x-footer />

    <!-- Share Script -->
    <script>
        function shareSkill() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $skill->title }}',
                    text: 'تعلم {{ $skill->title }} مع {{ $skill->user->name }} على خبرة لينك',
                    url: window.location.href
                }).catch(err => console.log('Error sharing:', err));
            } else {
                // Fallback: Copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('تم نسخ الرابط!');
                });
            }
        }
    </script>
</body>
</html>
