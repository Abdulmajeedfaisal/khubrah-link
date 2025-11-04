<x-admin-layout>
    <x-slot name="header">تفاصيل المستخدم</x-slot>

    <div class="space-y-6">
        <!-- User Info Card -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6">
                <div class="flex items-center gap-6">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-4xl font-bold text-blue-600">
                        أ
                    </div>
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-white mb-2">أحمد محمد علي</h2>
                        <p class="text-blue-100 mb-3">ahmed@example.com</p>
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold rounded-full">
                                مقدم خدمة
                            </span>
                            <span class="px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full">
                                نشط
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-100 text-sm mb-1">تاريخ التسجيل</p>
                        <p class="text-white font-semibold">2024-01-15</p>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-4 divide-x divide-gray-200 dark:divide-slate-700 border-b border-gray-200 dark:border-slate-700">
                <div class="p-6 text-center">
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mb-1">24</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">الجلسات</p>
                </div>
                <div class="p-6 text-center">
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mb-1">4.8</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">التقييم</p>
                </div>
                <div class="p-6 text-center">
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mb-1">5</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">المهارات</p>
                </div>
                <div class="p-6 text-center">
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mb-1">12</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">التقييمات</p>
                </div>
            </div>

            <!-- Details -->
            <div class="p-6 grid grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">رقم الهاتف</p>
                    <p class="font-semibold text-gray-900 dark:text-white">+966 50 123 4567</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">المدينة</p>
                    <p class="font-semibold text-gray-900 dark:text-white">الرياض</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">آخر نشاط</p>
                    <p class="font-semibold text-gray-900 dark:text-white">منذ ساعتين</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">حالة البريد</p>
                    <p class="font-semibold text-green-600 dark:text-green-400">✓ مفعّل</p>
                </div>
            </div>
        </div>

        <!-- Skills & Bio -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Skills -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">المهارات</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-sm font-semibold">Laravel</span>
                    <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-full text-sm font-semibold">Vue.js</span>
                    <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-full text-sm font-semibold">Tailwind CSS</span>
                    <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">MySQL</span>
                    <span class="px-3 py-1 bg-pink-100 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400 rounded-full text-sm font-semibold">API Development</span>
                </div>
            </div>

            <!-- Bio -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">نبذة تعريفية</h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    مطور ويب متخصص في Laravel و Vue.js مع خبرة 5 سنوات في تطوير تطبيقات الويب. أحب مشاركة معرفتي ومساعدة الآخرين على تعلم البرمجة.
                </p>
            </div>
        </div>

        <!-- Recent Sessions -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">الجلسات الأخيرة</h3>
            </div>
            <div class="divide-y divide-gray-200 dark:divide-slate-700">
                <!-- Session Item -->
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white mb-1">تعليم Laravel للمبتدئين</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">مع: سارة علي</p>
                        </div>
                        <div class="text-left">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">2024-03-15</p>
                            <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 text-xs font-semibold rounded-full">مكتملة</span>
                        </div>
                    </div>
                </div>

                <div class="p-4 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white mb-1">تطوير API باستخدام Laravel</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">مع: محمد خالد</p>
                        </div>
                        <div class="text-left">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">2024-03-10</p>
                            <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 text-xs font-semibold rounded-full">مكتملة</span>
                        </div>
                    </div>
                </div>

                <div class="p-4 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white mb-1">Vue.js المتقدم</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">مع: فاطمة حسن</p>
                        </div>
                        <div class="text-left">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">2024-03-20</p>
                            <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-semibold rounded-full">قادمة</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">الإجراءات</h3>
            <div class="flex flex-wrap gap-3">
                <button class="px-6 py-3 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    تعليق الحساب
                </button>

                <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    إرسال رسالة
                </button>

                <button class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    حذف الحساب
                </button>

                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    العودة للقائمة
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
