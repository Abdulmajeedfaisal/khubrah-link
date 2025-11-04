<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                    </svg>
                </div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
                    مرحباً، {{ Auth::user()->name }}
                </h2>
            </div>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    إليك ملخص نشاطك اليوم
                </p>
            </div>
            <span class="text-sm text-gray-500 dark:text-gray-400">
                {{ now()->locale('ar')->translatedFormat('l، j F Y') }}
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Skills -->
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-all hover:scale-105">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">مهاراتي</p>
                        <h3 class="text-4xl font-bold mt-2">12</h3>
                    </div>
                    <div class="bg-white/20 p-4 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
                <p class="text-blue-100 text-sm">+2 هذا الشهر</p>
            </div>

            <!-- Total Sessions -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-all hover:scale-105">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-green-100 text-sm font-medium">الجلسات</p>
                        <h3 class="text-4xl font-bold mt-2">24</h3>
                    </div>
                    <div class="bg-white/20 p-4 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-green-100 text-sm">5 قادمة</p>
            </div>

            <!-- Messages -->
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-all hover:scale-105">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">الرسائل</p>
                        <h3 class="text-4xl font-bold mt-2">8</h3>
                    </div>
                    <div class="bg-white/20 p-4 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-purple-100 text-sm">3 غير مقروءة</p>
            </div>

            <!-- Rating -->
            <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-all hover:scale-105">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-yellow-100 text-sm font-medium">التقييم</p>
                        <h3 class="text-4xl font-bold mt-2">4.8</h3>
                    </div>
                    <div class="bg-white/20 p-4 rounded-xl">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-yellow-100 text-sm">من 15 تقييم</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Upcoming Sessions -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">الجلسات القادمة</h3>
                        <a href="{{ route('sessions.index') }}" class="text-primary-600 dark:text-primary-400 hover:underline text-sm font-semibold">
                            عرض الكل
                        </a>
                    </div>

                    <div class="space-y-4">
                        <!-- Session Card 1 -->
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl hover:shadow-md transition-shadow cursor-pointer">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    م
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 dark:text-white truncate">محمد أحمد</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">تعلم Laravel</p>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">غداً</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">3:00 م</p>
                            </div>
                        </div>

                        <!-- Session Card 2 -->
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl hover:shadow-md transition-shadow cursor-pointer">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    س
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 dark:text-white truncate">سارة خالد</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">تعليم Photoshop</p>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">الأحد</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">5:00 م</p>
                            </div>
                        </div>

                        <!-- Session Card 3 -->
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl hover:shadow-md transition-shadow cursor-pointer">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    ع
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 dark:text-white truncate">عبدالله محمود</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">تعلم اللغة الإنجليزية</p>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">الإثنين</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">7:00 م</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Messages -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">إجراءات سريعة</h3>
                    <div class="space-y-3">
                        <a href="{{ route('skills.index') }}" class="flex items-center gap-3 p-3 bg-primary-50 dark:bg-primary-900/20 text-primary-700 dark:text-primary-400 rounded-xl hover:bg-primary-100 dark:hover:bg-primary-900/30 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <span class="font-semibold">ابحث عن مهارة</span>
                        </a>

                        <a href="{{ route('skills.manage') }}" class="flex items-center gap-3 p-3 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 rounded-xl hover:bg-green-100 dark:hover:bg-green-900/30 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span class="font-semibold">أضف مهارة جديدة</span>
                        </a>

                        <a href="{{ route('profile.show') }}" class="flex items-center gap-3 p-3 bg-purple-50 dark:bg-purple-900/20 text-purple-700 dark:text-purple-400 rounded-xl hover:bg-purple-100 dark:hover:bg-purple-900/30 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="font-semibold">عرض ملفي الشخصي</span>
                        </a>
                    </div>
                </div>

                <!-- Recent Messages -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">رسائل حديثة</h3>
                        <a href="{{ route('messages.index') }}" class="text-primary-600 dark:text-primary-400 hover:underline text-sm font-semibold">
                            عرض الكل
                        </a>
                    </div>

                    <div class="space-y-3">
                        <!-- Message 1 -->
                        <div class="flex items-start gap-3 p-3 hover:bg-gray-50 dark:hover:bg-slate-700/50 rounded-xl transition cursor-pointer">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                م
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 dark:text-white text-sm">محمد أحمد</h4>
                                <p class="text-xs text-gray-600 dark:text-gray-400 truncate">شكراً على الجلسة الرائعة!</p>
                                <span class="text-xs text-gray-500 dark:text-gray-500">منذ ساعتين</span>
                            </div>
                            <span class="w-2 h-2 bg-primary-600 rounded-full flex-shrink-0 mt-2"></span>
                        </div>

                        <!-- Message 2 -->
                        <div class="flex items-start gap-3 p-3 hover:bg-gray-50 dark:hover:bg-slate-700/50 rounded-xl transition cursor-pointer">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                س
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 dark:text-white text-sm">سارة خالد</h4>
                                <p class="text-xs text-gray-600 dark:text-gray-400 truncate">هل يمكننا تغيير موعد الجلسة؟</p>
                                <span class="text-xs text-gray-500 dark:text-gray-500">منذ 5 ساعات</span>
                            </div>
                        </div>

                        <!-- Message 3 -->
                        <div class="flex items-start gap-3 p-3 hover:bg-gray-50 dark:hover:bg-slate-700/50 rounded-xl transition cursor-pointer">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                ع
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 dark:text-white text-sm">عبدالله محمود</h4>
                                <p class="text-xs text-gray-600 dark:text-gray-400 truncate">مرحباً، أريد حجز جلسة</p>
                                <span class="text-xs text-gray-500 dark:text-gray-500">أمس</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
