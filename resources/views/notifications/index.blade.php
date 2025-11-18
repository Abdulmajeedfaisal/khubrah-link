<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
                    الإشعارات
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    تابع آخر التحديثات والرسائل
                </p>
            </div>
            <button class="text-sm text-primary-600 dark:text-primary-400 hover:underline font-semibold">
                تعليم الكل كمقروء
            </button>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Version 2 Notice -->
        <div class="mb-6 bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-yellow-900/20 dark:to-orange-900/20 border-2 border-yellow-200 dark:border-yellow-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/40 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-yellow-800 dark:text-yellow-300 mb-2">
                        ⏳ قيد التطوير - الإصدار الثاني
                    </h3>
                    <p class="text-yellow-700 dark:text-yellow-400 leading-relaxed mb-3">
                        نظام الإشعارات الفورية قيد التطوير حالياً وسيكون متاحاً في الإصدار الثاني من المنصة. سيتضمن النظام:
                    </p>
                    <ul class="list-disc list-inside text-yellow-700 dark:text-yellow-400 space-y-1 mr-4">
                        <li>إشعارات فورية للأحداث المهمة</li>
                        <li>إشعارات البريد الإلكتروني</li>
                        <li>إشعارات داخل التطبيق</li>
                        <li>تخصيص أنواع الإشعارات</li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-yellow-200 dark:border-yellow-800">
                        <p class="text-sm text-yellow-600 dark:text-yellow-500">
                            <strong>ملاحظة:</strong> الإشعارات المعروضة أدناه هي أمثلة توضيحية فقط.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="mb-6 opacity-60" x-data="{ filter: 'all' }">
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-2 inline-flex gap-2">
                <button 
                    @click="filter = 'all'"
                    :class="filter === 'all' ? 'bg-primary-600 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700'"
                    class="px-4 py-2 rounded-lg font-semibold text-sm transition-colors"
                >
                    الكل (12)
                </button>
                <button 
                    @click="filter = 'unread'"
                    :class="filter === 'unread' ? 'bg-primary-600 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700'"
                    class="px-4 py-2 rounded-lg font-semibold text-sm transition-colors"
                >
                    غير مقروءة (3)
                </button>
                <button 
                    @click="filter = 'read'"
                    :class="filter === 'read' ? 'bg-primary-600 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700'"
                    class="px-4 py-2 rounded-lg font-semibold text-sm transition-colors"
                >
                    مقروءة (9)
                </button>
            </div>
        </div>

        <!-- Notifications List -->
        <div class="space-y-3 opacity-60 pointer-events-none">
            
            <!-- Unread Notification - New Session -->
            <div class="bg-primary-50 dark:bg-primary-900/20 border-r-4 border-primary-600 rounded-xl p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                            جلسة جديدة مؤكدة
                        </h4>
                        <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">
                            تم تأكيد حجز جلسة Laravel Development مع <span class="font-semibold">محمد أحمد</span> غداً الساعة 3:00 م
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-600 dark:text-gray-400">
                            <span>منذ 5 دقائق</span>
                            <a href="#" class="text-primary-600 dark:text-primary-400 hover:underline font-semibold">عرض التفاصيل</a>
                        </div>
                    </div>
                    <span class="w-3 h-3 bg-primary-600 rounded-full flex-shrink-0 mt-1"></span>
                </div>
            </div>

            <!-- Unread Notification - New Message -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border-r-4 border-blue-600 rounded-xl p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                            رسالة جديدة
                        </h4>
                        <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">
                            <span class="font-semibold">سارة خالد</span> أرسلت لك رسالة: "شكراً على الجلسة الرائعة!"
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-600 dark:text-gray-400">
                            <span>منذ 30 دقيقة</span>
                            <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">عرض الرسالة</a>
                        </div>
                    </div>
                    <span class="w-3 h-3 bg-blue-600 rounded-full flex-shrink-0 mt-1"></span>
                </div>
            </div>

            <!-- Unread Notification - Review -->
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border-r-4 border-yellow-600 rounded-xl p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-yellow-600 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                            تقييم جديد
                        </h4>
                        <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">
                            <span class="font-semibold">أحمد علي</span> قيّمك بـ 5 نجوم على جلسة React.js
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-600 dark:text-gray-400">
                            <span>منذ ساعة</span>
                            <a href="#" class="text-yellow-600 dark:text-yellow-400 hover:underline font-semibold">عرض التقييم</a>
                        </div>
                    </div>
                    <span class="w-3 h-3 bg-yellow-600 rounded-full flex-shrink-0 mt-1"></span>
                </div>
            </div>

            <!-- Read Notification - Session Reminder -->
            <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl p-4 hover:shadow-md transition-shadow cursor-pointer opacity-75">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gray-200 dark:bg-slate-700 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-1">
                            تذكير بجلسة قادمة
                        </h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            لديك جلسة مع <span class="font-semibold">فاطمة محمد</span> بعد ساعتين
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-500">
                            <span>منذ 3 ساعات</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Read Notification - Session Completed -->
            <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl p-4 hover:shadow-md transition-shadow cursor-pointer opacity-75">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gray-200 dark:bg-slate-700 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-1">
                            جلسة مكتملة
                        </h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            تم إكمال جلسة Vue.js مع <span class="font-semibold">خالد أحمد</span>. يمكنك الآن تقييم الجلسة
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-500">
                            <span>منذ يوم</span>
                            <a href="#" class="text-primary-600 dark:text-primary-400 hover:underline font-semibold">تقييم الجلسة</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Read Notification - Booking Request -->
            <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl p-4 hover:shadow-md transition-shadow cursor-pointer opacity-75">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gray-200 dark:bg-slate-700 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-1">
                            طلب حجز جديد
                        </h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            <span class="font-semibold">عمر حسن</span> يريد حجز جلسة Python معك
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-500">
                            <span>منذ يومين</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State (hidden by default) -->
        <div class="hidden text-center py-16">
            <svg class="w-20 h-20 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">لا توجد إشعارات</h3>
            <p class="text-gray-600 dark:text-gray-400">ستظهر الإشعارات الجديدة هنا</p>
        </div>
    </div>
</x-app-layout>
