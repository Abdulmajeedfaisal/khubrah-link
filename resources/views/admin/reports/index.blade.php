<x-admin-layout>
    <x-slot name="header">إدارة البلاغات</x-slot>

    <div class="space-y-6">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">إجمالي البلاغات</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">45</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">قيد المراجعة</p>
                <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400 mt-2">5</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">تم الحل</p>
                <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-2">35</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">تم الرفض</p>
                <p class="text-2xl font-bold text-gray-600 dark:text-gray-400 mt-2">5</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <div class="flex flex-col md:flex-row gap-4">
                <select class="px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-white">
                    <option>جميع الحالات</option>
                    <option>قيد المراجعة</option>
                    <option>تم الحل</option>
                </select>
                <select class="px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-white">
                    <option>جميع الأنواع</option>
                    <option>محتوى غير لائق</option>
                    <option>احتيال</option>
                </select>
            </div>
        </div>

        <!-- Reports List -->
        <div class="space-y-4">
            <!-- Report Card -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border-r-4 border-red-500 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">محتوى غير لائق</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-3">تم الإبلاغ عن محتوى غير لائق في ملف المستخدم</p>
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span>المُبلغ: أحمد محمد</span>
                            <span>منذ ساعتين</span>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 text-xs font-semibold rounded-full">قيد المراجعة</span>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.reports.show', 1) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">عرض</a>
                    <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">قبول</button>
                    <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">رفض</button>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
