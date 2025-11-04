<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
            حجز جلسة تعليمية
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Booking Form -->
            <div class="lg:col-span-2">
                <form class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 space-y-6">
                    
                    <!-- Skill Selection -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            المهارة المطلوبة
                        </label>
                        <select class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            <option>Laravel Development</option>
                            <option>Vue.js Basics</option>
                            <option>API Design</option>
                        </select>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            اختر المهارة التي تريد تعلمها من هذا المعلم
                        </p>
                    </div>

                    <!-- Date Selection -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            التاريخ
                        </label>
                        <input type="date" value="2025-11-05" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                    </div>

                    <!-- Time Selection -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                وقت البداية
                            </label>
                            <input type="time" value="15:00" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                المدة
                            </label>
                            <select class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                <option value="1">ساعة واحدة</option>
                                <option value="2" selected>ساعتان</option>
                                <option value="3">3 ساعات</option>
                                <option value="4">4 ساعات</option>
                            </select>
                        </div>
                    </div>

                    <!-- Session Type -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            نوع الجلسة
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative flex items-center p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl cursor-pointer border-2 border-primary-600 dark:border-primary-500">
                                <input type="radio" name="session_type" value="online" checked class="sr-only">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                        </svg>
                                        <span class="font-semibold text-gray-900 dark:text-white">عن بُعد</span>
                                    </div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">عبر Zoom أو Google Meet</p>
                                </div>
                                <div class="w-5 h-5 bg-primary-600 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </label>

                            <label class="relative flex items-center p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl cursor-pointer border-2 border-transparent hover:border-gray-300 dark:hover:border-slate-600">
                                <input type="radio" name="session_type" value="in_person" class="sr-only">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="font-semibold text-gray-900 dark:text-white">حضوري</span>
                                    </div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">لقاء مباشر</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Location (if in-person) -->
                    <div x-data="{ showLocation: false }">
                        <div x-show="showLocation" x-transition>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                مكان اللقاء
                            </label>
                            <input type="text" placeholder="مثال: مقهى ستاربكس - شارع التحلية" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <!-- Notes -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            ملاحظات إضافية
                        </label>
                        <textarea rows="4" placeholder="أخبر المعلم عن أهدافك من الجلسة وما تريد التركيز عليه..." class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500 resize-none"></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                        <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-primary-600/30">
                            تأكيد الحجز
                        </button>
                        <a href="{{ route('dashboard') }}" class="px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl font-semibold transition-colors">
                            إلغاء
                        </a>
                    </div>
                </form>
            </div>

            <!-- Teacher Info Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 sticky top-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">معلومات المعلم</h3>
                    
                    <!-- Teacher Card -->
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto mb-3">
                            م
                        </div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-1">محمد أحمد</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">مطور Full Stack</p>
                        
                        <!-- Rating -->
                        <div class="flex items-center justify-center gap-1 mb-2">
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <span class="font-bold text-gray-900 dark:text-white">4.9</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">(45 تقييم)</span>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-slate-700/50 rounded-lg">
                            <span class="text-sm text-gray-600 dark:text-gray-400">الجلسات المكتملة</span>
                            <span class="font-bold text-gray-900 dark:text-white">127</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-slate-700/50 rounded-lg">
                            <span class="text-sm text-gray-600 dark:text-gray-400">معدل الاستجابة</span>
                            <span class="font-bold text-green-600 dark:text-green-400">98%</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-slate-700/50 rounded-lg">
                            <span class="text-sm text-gray-600 dark:text-gray-400">السعر/ساعة</span>
                            <span class="font-bold text-primary-600 dark:text-primary-400">مجاني</span>
                        </div>
                    </div>

                    <!-- View Profile -->
                    <a href="#" class="block w-full text-center px-4 py-2 border-2 border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors">
                        عرض الملف الشخصي
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
