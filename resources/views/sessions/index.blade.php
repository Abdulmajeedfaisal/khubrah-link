<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
                    جلساتي
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    إدارة جلسات التعليم والتعلم
                </p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ tab: 'upcoming' }">
        
        <!-- Tabs -->
        <div class="mb-8">
            <div class="border-b border-gray-200 dark:border-slate-700">
                <nav class="-mb-px flex gap-8">
                    <button @click="tab = 'upcoming'" :class="tab === 'upcoming' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm transition-colors">
                        القادمة (3)
                    </button>
                    <button @click="tab = 'completed'" :class="tab === 'completed' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm transition-colors">
                        المكتملة (12)
                    </button>
                    <button @click="tab = 'cancelled'" :class="tab === 'cancelled' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm transition-colors">
                        الملغاة (2)
                    </button>
                </nav>
            </div>
        </div>

        <!-- Upcoming Sessions -->
        <div x-show="tab === 'upcoming'" class="space-y-4">
            <!-- Session Card -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                            م
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">محمد أحمد</h3>
                                <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs rounded-full font-medium">مؤكدة</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 mb-2">تعلم Laravel</p>
                            <div class="flex items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    غداً - 2025-11-04
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    3:00 م - 5:00 م (ساعتان)
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                    </svg>
                                    عن بُعد
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-medium transition-colors text-sm">
                            رابط الجلسة
                        </button>
                        <button class="p-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-slate-700/50 rounded-lg p-3">
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">ملاحظات:</span> أريد التركيز على Eloquent ORM و Authentication
                    </p>
                </div>
            </div>
        </div>

        <!-- Completed Sessions -->
        <div x-show="tab === 'completed'" class="space-y-4">
            <div class="text-center py-12 bg-white dark:bg-slate-800 rounded-2xl border border-gray-200 dark:border-slate-700">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">12 جلسة مكتملة</h3>
                <p class="text-gray-600 dark:text-gray-400">رائع! لديك سجل جيد من الجلسات المكتملة</p>
            </div>
        </div>

        <!-- Cancelled Sessions -->
        <div x-show="tab === 'cancelled'" class="space-y-4">
            <div class="text-center py-12 bg-white dark:bg-slate-800 rounded-2xl border border-gray-200 dark:border-slate-700">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">2 جلسة ملغاة</h3>
                <p class="text-gray-600 dark:text-gray-400">الجلسات الملغاة ستظهر هنا</p>
            </div>
        </div>
    </div>
</x-app-layout>
