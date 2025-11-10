<x-admin-layout>
    <x-slot name="header">إدارة التقييمات</x-slot>

    <div class="space-y-6">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">إجمالي التقييمات</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ $stats['total'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gray-100 dark:bg-gray-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">موافق عليها</p>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $stats['approved'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">قيد المراجعة</p>
                        <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400 mt-2">{{ $stats['pending'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">تقييمات عالية</p>
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{ $stats['high_rated'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">تقييمات منخفضة</p>
                        <p class="text-2xl font-bold text-red-600 dark:text-red-400 mt-2">{{ $stats['low_rated'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <form method="GET" action="{{ route('admin.reviews.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">البحث</label>
                    <input type="text" 
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="ابحث عن مستخدم..."
                           class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white">
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الحالة</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white" onchange="this.form.submit()">
                        <option value="">الكل</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>موافق عليها</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>قيد المراجعة</option>
                    </select>
                </div>

                <!-- Rating Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">التقييم</label>
                    <select name="rating" class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white" onchange="this.form.submit()">
                        <option value="">جميع التقييمات</option>
                        <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 نجوم)</option>
                        <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ (4 نجوم)</option>
                        <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ (3 نجوم)</option>
                        <option value="2" {{ request('rating') == '2' ? 'selected' : '' }}>⭐⭐ (2 نجمتان)</option>
                        <option value="1" {{ request('rating') == '1' ? 'selected' : '' }}>⭐ (1 نجمة)</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex items-end">
                    <button type="submit" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors">
                        بحث
                    </button>
                </div>
            </form>
        </div>

        <!-- Reviews List -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">قائمة التقييمات ({{ $reviews->total() }})</h3>
            </div>
            <div class="divide-y divide-gray-200 dark:divide-slate-700">
                @forelse($reviews as $review)
                <div class="p-6 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <!-- Reviewer & Reviewee -->
                            <div class="flex items-center gap-4 mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                        {{ substr($review->reviewer->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $review->reviewer->name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">المقيّم</p>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">
                                        {{ substr($review->reviewee->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $review->reviewee->name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">المُقيَّم</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Session Info -->
                            <div class="mb-3">
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <span class="font-semibold">الجلسة:</span> {{ $review->session->skill->title }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">{{ $review->time_ago }}</p>
                            </div>

                            <!-- Rating -->
                            <div class="flex items-center gap-4 mb-3">
                                <div class="flex items-center gap-1">
                                    @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review->overall_rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    @endfor
                                    <span class="text-sm font-bold text-gray-900 dark:text-white mr-2">{{ $review->overall_rating }}/5</span>
                                </div>
                                
                                <!-- Detailed Ratings -->
                                <div class="flex items-center gap-2 text-xs text-gray-600 dark:text-gray-400">
                                    <span>تواصل: {{ $review->communication_rating }}</span>
                                    <span>•</span>
                                    <span>معرفة: {{ $review->knowledge_rating }}</span>
                                    <span>•</span>
                                    <span>التزام: {{ $review->punctuality_rating }}</span>
                                    <span>•</span>
                                    <span>احترافية: {{ $review->professionalism_rating }}</span>
                                </div>
                            </div>

                            <!-- Comment -->
                            @if($review->comment)
                            <div class="bg-gray-50 dark:bg-slate-700/50 rounded-lg p-3 mb-3">
                                <p class="text-sm text-gray-700 dark:text-gray-300">{{ $review->comment }}</p>
                            </div>
                            @endif

                            <!-- Status Badge -->
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 {{ $review->is_approved ? 'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400' : 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400' }} text-xs font-semibold rounded-full">
                                    {{ $review->is_approved ? 'موافق عليه' : 'قيد المراجعة' }}
                                </span>
                                @if($review->is_positive)
                                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-semibold rounded-full">
                                    تقييم إيجابي
                                </span>
                                @elseif($review->is_negative)
                                <span class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 text-xs font-semibold rounded-full">
                                    تقييم سلبي
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2">
                            <!-- View Details -->
                            <a href="{{ route('admin.reviews.show', $review) }}" class="p-2 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 rounded-lg transition-colors" title="عرض التفاصيل">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>

                            <!-- Toggle Approval -->
                            <form method="POST" action="{{ route('admin.reviews.toggle', $review) }}">
                                @csrf
                                <button type="submit" class="p-2 {{ $review->is_approved ? 'text-yellow-600 hover:bg-yellow-50 dark:hover:bg-yellow-900/30' : 'text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30' }} rounded-lg transition-colors" title="{{ $review->is_approved ? 'إلغاء الموافقة' : 'الموافقة' }}">
                                    @if($review->is_approved)
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                    </svg>
                                    @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    @endif
                                </button>
                            </form>

                            <!-- Delete -->
                            <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا التقييم؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg transition-colors" title="حذف">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    <p class="text-gray-600 dark:text-gray-400 text-lg font-semibold">لا توجد تقييمات</p>
                    <p class="text-gray-500 dark:text-gray-500 text-sm mt-2">لم يتم العثور على أي تقييمات</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($reviews->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-700">
                {{ $reviews->links() }}
            </div>
            @endif
        </div>
    </div>
</x-admin-layout>
