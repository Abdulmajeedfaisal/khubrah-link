<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
            حجز جلسة تعليمية
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Booking Form -->
            <div class="lg:col-span-2">
                <form method="POST" action="{{ route('sessions.store') }}" class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 space-y-6">
                    @csrf
                    
                    <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                    
                    <!-- Skill Selection -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            المهارة المطلوبة <span class="text-red-500">*</span>
                        </label>
                        @if(isset($selectedSkill))
                            <!-- Pre-selected skill (read-only) -->
                            <input type="hidden" name="skill_id" value="{{ $selectedSkill->id }}">
                            <div class="w-full px-4 py-3 rounded-xl border-2 border-primary-500 bg-primary-50 dark:bg-primary-900/20">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-white">{{ $selectedSkill->title }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $selectedSkill->category->name_ar }}</p>
                                    </div>
                                    <span class="text-sm font-bold text-primary-600 dark:text-primary-400">
                                        @if($selectedSkill->price_per_hour)
                                            {{ number_format($selectedSkill->price_per_hour) }} ر.س/ساعة
                                        @else
                                            مجاناً
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                المهارة المحددة للحجز
                            </p>
                        @else
                            <!-- Skill dropdown -->
                            <select name="skill_id" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                <option value="">اختر المهارة</option>
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}" {{ old('skill_id') == $skill->id ? 'selected' : '' }}>
                                        {{ $skill->title }} - {{ $skill->category->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                اختر المهارة التي تريد تعلمها من هذا المعلم
                            </p>
                        @endif
                    </div>

                    <!-- Date and Time Selection -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                التاريخ <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="date" required min="{{ date('Y-m-d') }}" value="{{ old('date') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                يمكنك اختيار تاريخ اليوم أو أي تاريخ مستقبلي
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                الوقت <span class="text-red-500">*</span>
                            </label>
                            <input type="time" name="time" required value="{{ old('time') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <!-- Duration Selection -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            المدة <span class="text-red-500">*</span>
                        </label>
                        <select name="duration" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            <option value="60" {{ old('duration') == 60 ? 'selected' : '' }}>ساعة واحدة (60 دقيقة)</option>
                            <option value="90" {{ old('duration') == 90 ? 'selected' : '' }}>ساعة ونصف (90 دقيقة)</option>
                            <option value="120" {{ old('duration') == 120 ? 'selected' : '' }}>ساعتان (120 دقيقة)</option>
                            <option value="180" {{ old('duration') == 180 ? 'selected' : '' }}>3 ساعات (180 دقيقة)</option>
                        </select>
                    </div>

                    <!-- Session Type -->
                    <div x-data="{ sessionType: '{{ old('session_type', 'online') }}' }">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            نوع الجلسة <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative flex items-center p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl cursor-pointer border-2 transition-colors" :class="sessionType === 'online' ? 'border-primary-600 dark:border-primary-500' : 'border-transparent hover:border-gray-300 dark:hover:border-slate-600'">
                                <input type="radio" name="session_type" value="online" x-model="sessionType" class="sr-only">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <svg class="w-5 h-5" :class="sessionType === 'online' ? 'text-primary-600 dark:text-primary-400' : 'text-gray-600 dark:text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                        </svg>
                                        <span class="font-semibold text-gray-900 dark:text-white">عن بُعد</span>
                                    </div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">عبر Zoom أو Google Meet</p>
                                </div>
                                <div x-show="sessionType === 'online'" class="w-5 h-5 bg-primary-600 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </label>

                            <label class="relative flex items-center p-4 bg-gray-50 dark:bg-slate-700/50 rounded-xl cursor-pointer border-2 transition-colors" :class="sessionType === 'in-person' ? 'border-primary-600 dark:border-primary-500' : 'border-transparent hover:border-gray-300 dark:hover:border-slate-600'">
                                <input type="radio" name="session_type" value="in-person" x-model="sessionType" class="sr-only">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <svg class="w-5 h-5" :class="sessionType === 'in-person' ? 'text-primary-600 dark:text-primary-400' : 'text-gray-600 dark:text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="font-semibold text-gray-900 dark:text-white">حضوري</span>
                                    </div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">لقاء مباشر</p>
                                </div>
                                <div x-show="sessionType === 'in-person'" class="w-5 h-5 bg-primary-600 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </label>
                        </div>

                        <!-- Meeting Link (if online) -->
                        <div x-show="sessionType === 'online'" x-transition class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                رابط الاجتماع (اختياري)
                            </label>
                            <input type="url" name="meeting_link" value="{{ old('meeting_link') }}" placeholder="https://meet.google.com/..." class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                يمكن للمعلم إضافة الرابط لاحقاً
                            </p>
                        </div>

                        <!-- Location (if in-person) -->
                        <div x-show="sessionType === 'in-person'" x-transition class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                مكان اللقاء <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="location" value="{{ old('location') }}" placeholder="مثال: مقهى ستاربكس - شارع التحلية" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <!-- Notes -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            ملاحظات إضافية
                        </label>
                        <textarea name="notes" rows="4" placeholder="أخبر المعلم عن أهدافك من الجلسة وما تريد التركيز عليه..." class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500 resize-none">{{ old('notes') }}</textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                        <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-primary-600/30">
                            تأكيد الحجز
                        </button>
                        <a href="{{ route('profile.public', $teacher) }}" class="px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl font-semibold transition-colors">
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
                        <div class="w-20 h-20 bg-gradient-to-br from-primary-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto mb-3">
                            {{ substr($teacher->name, 0, 1) }}
                        </div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-1">{{ $teacher->name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">{{ $teacher->bio ?? 'مستخدم' }}</p>
                        
                        <!-- Rating -->
                        <div class="flex items-center justify-center gap-1 mb-2">
                            <svg class="w-5 h-5 text-gray-400 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <span class="font-bold text-gray-400 dark:text-gray-500">--</span>
                            <span class="text-xs bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 px-2 py-0.5 rounded">الإصدار الثاني</span>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-slate-700/50 rounded-lg">
                            <span class="text-sm text-gray-600 dark:text-gray-400">المهارات</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $skills->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-slate-700/50 rounded-lg">
                            <span class="text-sm text-gray-600 dark:text-gray-400">الجلسات المكتملة</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $teacher->completed_sessions_count ?? 0 }}</span>
                        </div>
                    </div>

                    <!-- View Profile -->
                    <a href="{{ route('profile.public', $teacher) }}" class="block w-full text-center px-4 py-2 border-2 border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors">
                        عرض الملف الشخصي
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

