<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
            الرسائل
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 h-[600px]">
                
                <!-- Conversations List -->
                <div class="border-l border-gray-200 dark:border-slate-700 overflow-y-auto">
                    <div class="p-4 border-b border-gray-200 dark:border-slate-700">
                        <input type="text" placeholder="بحث في الرسائل..." class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                    </div>
                    
                    <div class="divide-y divide-gray-200 dark:divide-slate-700">
                        <!-- Conversation 1 -->
                        <div class="p-4 hover:bg-gray-50 dark:hover:bg-slate-700 cursor-pointer bg-primary-50 dark:bg-primary-900/20">
                            <div class="flex items-start gap-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                    م
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <h4 class="font-semibold text-gray-900 dark:text-white truncate">محمد أحمد</h4>
                                        <span class="text-xs text-gray-500">منذ 5 دقائق</span>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 truncate">شكراً على الجلسة الرائعة!</p>
                                </div>
                                <span class="w-2 h-2 bg-primary-600 rounded-full flex-shrink-0 mt-2"></span>
                            </div>
                        </div>

                        <!-- Conversation 2 -->
                        <div class="p-4 hover:bg-gray-50 dark:hover:bg-slate-700 cursor-pointer">
                            <div class="flex items-start gap-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                    س
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <h4 class="font-semibold text-gray-900 dark:text-white truncate">سارة خالد</h4>
                                        <span class="text-xs text-gray-500">منذ ساعة</span>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 truncate">هل يمكننا تغيير موعد الجلسة؟</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Area -->
                <div class="md:col-span-2 flex flex-col">
                    <!-- Chat Header -->
                    <div class="p-4 border-b border-gray-200 dark:border-slate-700 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                م
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">محمد أحمد</h3>
                                <p class="text-xs text-green-600 dark:text-green-400">متصل الآن</p>
                            </div>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50 dark:bg-slate-900">
                        <!-- Received Message -->
                        <div class="flex items-start gap-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                م
                            </div>
                            <div class="bg-white dark:bg-slate-800 rounded-2xl rounded-tr-none p-3 max-w-xs shadow-sm">
                                <p class="text-gray-900 dark:text-white text-sm">مرحباً! شكراً على الجلسة الرائعة اليوم</p>
                                <span class="text-xs text-gray-500 mt-1 block">10:30 ص</span>
                            </div>
                        </div>

                        <!-- Sent Message -->
                        <div class="flex items-start gap-2 justify-end">
                            <div class="bg-primary-600 text-white rounded-2xl rounded-tl-none p-3 max-w-xs shadow-sm">
                                <p class="text-sm">العفو! سعيد أنك استفدت</p>
                                <span class="text-xs text-primary-100 mt-1 block">10:32 ص</span>
                            </div>
                        </div>
                    </div>

                    <!-- Message Input -->
                    <div class="p-4 border-t border-gray-200 dark:border-slate-700">
                        <div class="flex items-center gap-2">
                            <input type="text" placeholder="اكتب رسالتك..." class="flex-1 px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            <button class="bg-primary-600 hover:bg-primary-700 text-white p-3 rounded-xl transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
