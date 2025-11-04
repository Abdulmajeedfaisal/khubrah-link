<x-admin-layout>
    <x-slot name="header">إدارة فئات المهارات</x-slot>

    <div class="space-y-6">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">إجمالي الفئات</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">8</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">المهارات النشطة</p>
                <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-2">156</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">الأكثر استخداماً</p>
                <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-2">التقنية</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">مقدمو الخدمات</p>
                <p class="text-2xl font-bold text-purple-600 dark:text-purple-400 mt-2">342</p>
            </div>
        </div>

        <!-- Add Category Button -->
        <div class="flex justify-end">
            <button class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                إضافة فئة جديدة
            </button>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Category Card 1 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">التقنية والبرمجة</h3>
                                <p class="text-blue-100 text-sm">Technology</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المهارات</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">45</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المقدمون</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">128</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors font-semibold text-sm">
                            تعديل
                        </button>
                        <button class="px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold text-sm">
                            حذف
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 2 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="bg-gradient-to-r from-green-500 to-green-600 p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">الفنون والحرف</h3>
                                <p class="text-green-100 text-sm">Arts & Crafts</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المهارات</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">32</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المقدمون</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">89</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors font-semibold text-sm">
                            تعديل
                        </button>
                        <button class="px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold text-sm">
                            حذف
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 3 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center text-2xl">
                                🇬🇧
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">اللغات</h3>
                                <p class="text-purple-100 text-sm">Languages</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المهارات</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">28</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المقدمون</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">76</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors font-semibold text-sm">
                            تعديل
                        </button>
                        <button class="px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold text-sm">
                            حذف
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 4 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center text-2xl">
                                🍳
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">الطبخ والمأكولات</h3>
                                <p class="text-orange-100 text-sm">Cooking</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المهارات</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">18</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المقدمون</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">42</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 bg-orange-50 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/30 transition-colors font-semibold text-sm">
                            تعديل
                        </button>
                        <button class="px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold text-sm">
                            حذف
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 5 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="bg-gradient-to-r from-red-500 to-red-600 p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center text-2xl">
                                ⚽
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">الرياضة واللياقة</h3>
                                <p class="text-red-100 text-sm">Sports & Fitness</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المهارات</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">15</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المقدمون</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">38</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold text-sm">
                            تعديل
                        </button>
                        <button class="px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold text-sm">
                            حذف
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 6 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="bg-gradient-to-r from-pink-500 to-pink-600 p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">التعليم والتدريس</h3>
                                <p class="text-pink-100 text-sm">Education</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المهارات</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">12</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">المقدمون</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">29</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 bg-pink-50 dark:bg-pink-900/20 text-pink-600 dark:text-pink-400 rounded-lg hover:bg-pink-100 dark:hover:bg-pink-900/30 transition-colors font-semibold text-sm">
                            تعديل
                        </button>
                        <button class="px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold text-sm">
                            حذف
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
