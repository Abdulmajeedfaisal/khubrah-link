<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
            الإعدادات
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Account Settings -->
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                إعدادات الحساب
            </h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الاسم الكامل</label>
                    <input type="text" value="{{ Auth::user()->name }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">البريد الإلكتروني</label>
                    <input type="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الموقع</label>
                    <input type="text" placeholder="المدينة، الدولة" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                </div>

                <button class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                    حفظ التغييرات
                </button>
            </div>
        </div>

        <!-- Notification Settings -->
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                إعدادات الإشعارات
            </h3>
            
            <div class="space-y-4">
                <label class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl cursor-pointer hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                    <div>
                        <div class="font-semibold text-gray-900 dark:text-white">إشعارات الرسائل</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">تلقي إشعارات عند وصول رسائل جديدة</div>
                    </div>
                    <input type="checkbox" checked class="w-5 h-5 text-primary-600 rounded focus:ring-primary-500">
                </label>

                <label class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl cursor-pointer hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                    <div>
                        <div class="font-semibold text-gray-900 dark:text-white">إشعارات الجلسات</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">تذكير بالجلسات القادمة</div>
                    </div>
                    <input type="checkbox" checked class="w-5 h-5 text-primary-600 rounded focus:ring-primary-500">
                </label>

                <label class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl cursor-pointer hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                    <div>
                        <div class="font-semibold text-gray-900 dark:text-white">إشعارات التقييمات</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">تلقي إشعارات عند حصولك على تقييم جديد</div>
                    </div>
                    <input type="checkbox" checked class="w-5 h-5 text-primary-600 rounded focus:ring-primary-500">
                </label>
            </div>
        </div>

        <!-- Privacy Settings -->
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                الخصوصية والأمان
            </h3>
            
            <div class="space-y-4">
                <label class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl cursor-pointer hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                    <div>
                        <div class="font-semibold text-gray-900 dark:text-white">إظهار الملف الشخصي</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">السماح للآخرين بمشاهدة ملفك الشخصي</div>
                    </div>
                    <input type="checkbox" checked class="w-5 h-5 text-primary-600 rounded focus:ring-primary-500">
                </label>

                <div class="pt-4 border-t border-gray-200 dark:border-slate-700">
                    <a href="{{ route('profile.edit') }}" class="text-primary-600 dark:text-primary-400 hover:underline font-semibold">
                        تغيير كلمة المرور
                    </a>
                </div>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="bg-red-50 dark:bg-red-900/20 rounded-2xl border-2 border-red-200 dark:border-red-800 p-6">
            <h3 class="text-xl font-bold text-red-900 dark:text-red-400 mb-4 flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                منطقة الخطر
            </h3>
            <p class="text-red-800 dark:text-red-300 mb-4">حذف الحساب نهائياً. هذا الإجراء لا يمكن التراجع عنه.</p>
            <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                حذف الحساب
            </button>
        </div>
    </div>
</x-app-layout>
