<x-admin-layout>
    <x-slot name="header">تفاصيل البلاغ</x-slot>

    <div class="space-y-6">
        <!-- Report Header -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border-r-4 border-red-500 overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 text-xs font-bold rounded-full">
                                عالي الأولوية
                            </span>
                            <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400 text-xs font-semibold rounded-full">
                                قيد المراجعة
                            </span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">محتوى غير لائق</h2>
                        <p class="text-gray-600 dark:text-gray-400">تم الإبلاغ عن محتوى غير لائق في ملف المستخدم</p>
                    </div>
                    <div class="text-left">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">رقم البلاغ</p>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">#12345</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">تاريخ البلاغ</p>
                        <p class="font-semibold text-gray-900 dark:text-white">2024-03-15 14:30</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">نوع البلاغ</p>
                        <p class="font-semibold text-gray-900 dark:text-white">محتوى غير لائق</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">الحالة</p>
                        <p class="font-semibold text-yellow-600 dark:text-yellow-400">قيد المراجعة</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reporter & Reported User -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Reporter Info -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    المُبلغ
                </h3>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                        أ
                    </div>
                    <div>
                        <p class="font-bold text-gray-900 dark:text-white mb-1">أحمد محمد</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">ahmed@example.com</p>
                    </div>
                </div>
                <div class="space-y-2 pt-4 border-t border-gray-200 dark:border-slate-700">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">عدد البلاغات السابقة</span>
                        <span class="font-semibold text-gray-900 dark:text-white">2</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">تاريخ التسجيل</span>
                        <span class="font-semibold text-gray-900 dark:text-white">2024-01-15</span>
                    </div>
                </div>
                <a href="#" class="mt-4 block text-center px-4 py-2 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors font-semibold">
                    عرض الملف الشخصي
                </a>
            </div>

            <!-- Reported User Info -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    المُبلغ عنه
                </h3>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                        م
                    </div>
                    <div>
                        <p class="font-bold text-gray-900 dark:text-white mb-1">محمد خالد</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">mohammed@example.com</p>
                    </div>
                </div>
                <div class="space-y-2 pt-4 border-t border-gray-200 dark:border-slate-700">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">عدد البلاغات ضده</span>
                        <span class="font-semibold text-red-600 dark:text-red-400">5</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">حالة الحساب</span>
                        <span class="font-semibold text-green-600 dark:text-green-400">نشط</span>
                    </div>
                </div>
                <a href="#" class="mt-4 block text-center px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold">
                    عرض الملف الشخصي
                </a>
            </div>
        </div>

        <!-- Report Details -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">تفاصيل البلاغ</h3>
            <div class="prose dark:prose-invert max-w-none">
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    يحتوي الملف الشخصي للمستخدم على صور ومحتوى غير لائق ومخالف لشروط الاستخدام. تم رفع هذا البلاغ بعد ملاحظة المحتوى المخالف في قسم "نبذة تعريفية" والصور الشخصية.
                </p>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed mt-4">
                    المحتوى المخالف يتضمن:
                </p>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 mt-2 space-y-1">
                    <li>صور غير لائقة في الملف الشخصي</li>
                    <li>نصوص مسيئة في النبذة التعريفية</li>
                    <li>روابط خارجية مشبوهة</li>
                </ul>
            </div>
        </div>

        <!-- Evidence/Screenshots -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">الأدلة والمرفقات</h3>
            <div class="grid grid-cols-3 gap-4">
                <div class="aspect-video bg-gray-100 dark:bg-slate-700 rounded-lg flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="aspect-video bg-gray-100 dark:bg-slate-700 rounded-lg flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="aspect-video bg-gray-100 dark:bg-slate-700 rounded-lg flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-4">
                تم إرفاق 3 صور كدليل على المحتوى المخالف
            </p>
        </div>

        <!-- Action History -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">سجل الإجراءات</h3>
            <div class="space-y-4">
                <div class="flex gap-4">
                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 dark:text-white">تم إنشاء البلاغ</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">2024-03-15 14:30 - بواسطة أحمد محمد</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 dark:text-white">تحت المراجعة</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">2024-03-15 14:35 - تلقائي</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">اتخاذ إجراء</h3>
            <div class="flex flex-wrap gap-3">
                <button class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    قبول البلاغ واتخاذ إجراء
                </button>

                <button class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    رفض البلاغ
                </button>

                <button class="px-6 py-3 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    طلب معلومات إضافية
                </button>

                <a href="{{ route('admin.reports.index') }}" class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    العودة للقائمة
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
