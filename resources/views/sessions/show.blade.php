<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
                    تفاصيل الجلسة
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    {{ $session->skill->title }}
                </p>
            </div>
            <span class="px-4 py-2 {{ $session->status_color }} rounded-full font-semibold text-sm">
                {{ $session->status_arabic }}
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Session Info Card -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        معلومات الجلسة
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-start gap-3 p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <div class="w-10 h-10 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">التاريخ</p>
                                <p class="font-bold text-gray-900 dark:text-white">{{ $session->scheduled_at->format('Y-m-d') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">الوقت</p>
                                <p class="font-bold text-gray-900 dark:text-white">{{ $session->scheduled_at->format('h:i A') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">المدة</p>
                                <p class="font-bold text-gray-900 dark:text-white">{{ $session->duration }} دقيقة</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                            <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                @if($session->session_type === 'online')
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">النوع</p>
                                <p class="font-bold text-gray-900 dark:text-white">{{ $session->session_type === 'online' ? 'عن بُعد' : 'حضوري' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                @if($session->notes)
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            ملاحظات الجلسة
                        </h3>
                        <div class="bg-gray-50 dark:bg-slate-700/50 rounded-xl p-4">
                            <p class="text-gray-700 dark:text-gray-300">
                                {{ $session->notes }}
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <div class="flex flex-wrap items-center gap-4">
                        @if($session->status === 'confirmed' && $session->meeting_link)
                            <a href="{{ $session->meeting_link }}" target="_blank" class="flex-1 min-w-[200px] bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-primary-600/30 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                الانضمام للجلسة
                            </a>
                        @endif
                        
                        @if($session->isTeacher(auth()->id()) && $session->status === 'pending')
                            <form method="POST" action="{{ route('sessions.confirm', $session) }}" class="flex-1 min-w-[200px]">
                                @csrf
                                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-green-600/30 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    تأكيد الجلسة
                                </button>
                            </form>
                        @endif

                        @if($session->isTeacher(auth()->id()) && $session->canBeCompleted())
                            <form method="POST" action="{{ route('sessions.complete', $session) }}" class="flex-1 min-w-[200px]">
                                @csrf
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-blue-600/30 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    إكمال الجلسة
                                </button>
                            </form>
                        @endif
                        
                        @if(in_array($session->status, ['pending', 'confirmed']))
                            <button @click="$dispatch('open-reschedule-modal')" class="px-6 py-3 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                إعادة جدولة
                            </button>

                            @if($session->canBeCancelled())
                                <button @click="$dispatch('open-cancel-modal')" class="px-6 py-3 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-xl font-semibold hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    إلغاء الجلسة
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                
                @php
                    $otherUser = $session->isTeacher(auth()->id()) ? $session->learner : $session->teacher;
                    $role = $session->isTeacher(auth()->id()) ? 'المتعلم' : 'المعلم';
                @endphp

                <!-- Other User Card -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">{{ $role }}</h3>
                    
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                            {{ substr($otherUser->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">{{ $otherUser->name }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $otherUser->bio ?? 'مستخدم' }}</p>
                            @if($otherUser->average_rating)
                                <div class="flex items-center gap-1 mt-1">
                                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ number_format($otherUser->average_rating, 1) }}</span>
                                    <span class="text-xs text-gray-600 dark:text-gray-400">({{ $otherUser->reviews_count }})</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('messages.index') }}" class="flex-1 px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-medium text-center transition-colors text-sm">
                            إرسال رسالة
                        </a>
                        <a href="{{ route('profile.public', $otherUser) }}" class="px-4 py-2 border-2 border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors text-sm">
                            الملف الشخصي
                        </a>
                    </div>
                </div>

                <!-- Meeting Link -->
                @if($session->meeting_link && $session->status === 'confirmed')
                    <div class="bg-gradient-to-br from-primary-50 to-blue-50 dark:from-primary-900/20 dark:to-blue-900/20 rounded-2xl border-2 border-primary-200 dark:border-primary-800 p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                            <h3 class="font-bold text-gray-900 dark:text-white">رابط الجلسة</h3>
                        </div>
                        <div class="bg-white dark:bg-slate-800 rounded-lg p-3 border border-gray-200 dark:border-slate-700 mb-3">
                            <code class="text-xs text-gray-600 dark:text-gray-400 break-all">
                                {{ $session->meeting_link }}
                            </code>
                        </div>
                        <a href="{{ $session->meeting_link }}" target="_blank" class="block w-full text-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-semibold transition-colors text-sm">
                            فتح الرابط
                        </a>
                    </div>
                @endif

                @if($session->location && $session->session_type === 'in-person')
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-2xl border-2 border-green-200 dark:border-green-800 p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <h3 class="font-bold text-gray-900 dark:text-white">مكان اللقاء</h3>
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $session->location }}
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Reschedule Modal -->
        <div x-data="{ showReschedule: false }" 
             @open-reschedule-modal.window="showReschedule = true"
             x-show="showReschedule" 
             x-cloak 
             class="fixed inset-0 z-50 overflow-y-auto" 
             style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black opacity-50" @click="showReschedule = false"></div>
                
                <div class="relative bg-white dark:bg-slate-800 rounded-2xl shadow-xl max-w-md w-full p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        إعادة جدولة الجلسة
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        اختر الموعد الجديد للجلسة
                    </p>

                    <form method="POST" action="{{ route('sessions.reschedule', $session) }}">
                        @csrf
                        
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                الموعد الجديد <span class="text-red-500">*</span>
                            </label>
                            <input type="datetime-local" 
                                   name="scheduled_at" 
                                   required 
                                   min="{{ now()->format('Y-m-d\TH:i') }}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <button type="button" 
                                    @click="showReschedule = false" 
                                    class="px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl font-semibold transition-colors">
                                إلغاء
                            </button>
                            <button type="submit" 
                                    class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                                تأكيد إعادة الجدولة
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Cancel Modal -->
        <div x-data="{ showCancel: false }" 
             @open-cancel-modal.window="showCancel = true"
             x-show="showCancel" 
             x-cloak 
             class="fixed inset-0 z-50 overflow-y-auto" 
             style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black opacity-50" @click="showCancel = false"></div>
                
                <div class="relative bg-white dark:bg-slate-800 rounded-2xl shadow-xl max-w-md w-full p-6">
                    <h3 class="text-xl font-bold text-red-600 dark:text-red-400 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        إلغاء الجلسة
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        هل أنت متأكد من إلغاء هذه الجلسة؟ يرجى ذكر سبب الإلغاء.
                    </p>

                    <form method="POST" action="{{ route('sessions.cancel', $session) }}">
                        @csrf
                        
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                سبب الإلغاء <span class="text-red-500">*</span>
                            </label>
                            <textarea name="cancellation_reason" 
                                      required 
                                      rows="4" 
                                      placeholder="يرجى توضيح سبب إلغاء الجلسة..."
                                      class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-red-500 resize-none"></textarea>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                الحد الأقصى 500 حرف
                            </p>
                        </div>

                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-3 mb-6">
                            <p class="text-sm text-yellow-800 dark:text-yellow-200">
                                <strong>تنبيه:</strong> سيتم إخطار الطرف الآخر بإلغاء الجلسة.
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <button type="button" 
                                    @click="showCancel = false" 
                                    class="px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl font-semibold transition-colors">
                                تراجع
                            </button>
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                                تأكيد الإلغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


