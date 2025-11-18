<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
            تقييم الجلسة
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
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
                        نظام التقييمات قيد التطوير حالياً وسيكون متاحاً في الإصدار الثاني من المنصة. سيتضمن النظام:
                    </p>
                    <ul class="list-disc list-inside text-yellow-700 dark:text-yellow-400 space-y-1 mr-4">
                        <li>تقييم شامل للجلسات (5 نجوم)</li>
                        <li>تقييمات فرعية (التواصل، المعرفة، الالتزام، الاحترافية)</li>
                        <li>إضافة تعليقات نصية</li>
                        <li>عرض التقييمات في الملفات الشخصية</li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-yellow-200 dark:border-yellow-800">
                        <p class="text-sm text-yellow-600 dark:text-yellow-500">
                            <strong>ملاحظة:</strong> النموذج أدناه للعرض التوضيحي فقط ولن يتم حفظ البيانات.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Session Summary -->
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                    م
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-900 dark:text-white mb-1">جلسة مع محمد أحمد</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">Laravel Development</p>
                    <p class="text-gray-500 dark:text-gray-500 text-xs">2025-11-04 • 3:00 م - 5:00 م</p>
                </div>
                <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-full text-sm font-medium">
                    مكتملة
                </span>
            </div>
        </div>

        <!-- Review Form (Disabled - Version 2) -->
        <form class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 space-y-6 opacity-60 pointer-events-none">
            
            <!-- Rating -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                    التقييم العام
                </label>
                <div x-data="{ rating: 0, hoverRating: 0 }" class="flex items-center gap-2">
                    <template x-for="star in 5" :key="star">
                        <button 
                            type="button"
                            @click="rating = star"
                            @mouseenter="hoverRating = star"
                            @mouseleave="hoverRating = 0"
                            class="focus:outline-none transition-transform hover:scale-110"
                        >
                            <svg 
                                class="w-12 h-12 transition-colors"
                                :class="star <= (hoverRating || rating) ? 'text-yellow-400 fill-current' : 'text-gray-300 dark:text-gray-600'"
                                viewBox="0 0 20 20"
                            >
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </button>
                    </template>
                    <span x-show="rating > 0" x-text="rating + ' من 5'" class="mr-3 text-gray-700 dark:text-gray-300 font-semibold"></span>
                </div>
            </div>

            <!-- Detailed Ratings -->
            <div class="border-t border-gray-200 dark:border-slate-700 pt-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">تقييم تفصيلي</h3>
                
                <div class="space-y-4">
                    <!-- Communication -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">التواصل والوضوح</label>
                            <span class="text-sm text-gray-600 dark:text-gray-400">5/5</span>
                        </div>
                        <input type="range" min="1" max="5" value="5" class="w-full h-2 bg-gray-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-primary-600">
                    </div>

                    <!-- Knowledge -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">المعرفة والخبرة</label>
                            <span class="text-sm text-gray-600 dark:text-gray-400">5/5</span>
                        </div>
                        <input type="range" min="1" max="5" value="5" class="w-full h-2 bg-gray-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-primary-600">
                    </div>

                    <!-- Patience -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">الصبر والتشجيع</label>
                            <span class="text-sm text-gray-600 dark:text-gray-400">5/5</span>
                        </div>
                        <input type="range" min="1" max="5" value="5" class="w-full h-2 bg-gray-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-primary-600">
                    </div>

                    <!-- Preparation -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">التحضير والتنظيم</label>
                            <span class="text-sm text-gray-600 dark:text-gray-400">5/5</span>
                        </div>
                        <input type="range" min="1" max="5" value="5" class="w-full h-2 bg-gray-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-primary-600">
                    </div>
                </div>
            </div>

            <!-- Written Review -->
            <div class="border-t border-gray-200 dark:border-slate-700 pt-6">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    تعليقك على الجلسة
                </label>
                <textarea 
                    rows="6" 
                    placeholder="شارك تجربتك مع الآخرين... ماذا تعلمت؟ كيف كانت الجلسة؟ هل تنصح بهذا المعلم؟"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500 resize-none"
                ></textarea>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                    سيساعد تعليقك المتعلمين الآخرين في اتخاذ قرارهم
                </p>
            </div>

            <!-- Would Recommend -->
            <div class="border-t border-gray-200 dark:border-slate-700 pt-6">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" checked class="w-5 h-5 text-primary-600 rounded focus:ring-primary-500">
                    <span class="text-gray-700 dark:text-gray-300 font-medium">
                        أنصح بهذا المعلم للآخرين
                    </span>
                </label>
            </div>

            <!-- Tips Section -->
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-4 border border-blue-200 dark:border-blue-800">
                <div class="flex gap-3">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="text-sm text-blue-900 dark:text-blue-300">
                        <p class="font-semibold mb-1">نصائح لكتابة تقييم مفيد:</p>
                        <ul class="space-y-1 text-xs">
                            <li>• كن صادقاً وموضوعياً</li>
                            <li>• اذكر ما أعجبك وما يمكن تحسينه</li>
                            <li>• تجنب المعلومات الشخصية</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-primary-600/30">
                    إرسال التقييم
                </button>
                <a href="{{ route('sessions.index') }}" class="px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl font-semibold transition-colors">
                    إلغاء
                </a>
            </div>
        </form>

        <!-- Privacy Notice -->
        <div class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
            <p>سيتم نشر تقييمك على الملف الشخصي للمعلم. يمكنك تعديله أو حذفه لاحقاً.</p>
        </div>
    </div>
</x-app-layout>
