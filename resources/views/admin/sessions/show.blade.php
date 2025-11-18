<x-admin-layout>
    <x-slot name="header">تفاصيل الجلسة</x-slot>

    <div class="space-y-6">
        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900/30 border border-green-500 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 dark:bg-red-900/30 border border-red-500 text-red-700 dark:text-red-400 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
        @endif

        <!-- Back Button -->
        <div class="flex justify-end">
            <a href="{{ route('admin.sessions.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition-colors">
                العودة للقائمة
            </a>
        </div>

        <!-- Session Info -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $session->skill->title }}</h2>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-medium rounded-full">
                            {{ $session->skill->category->name_ar }}
                        </span>
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300',
                                'confirmed' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300',
                                'completed' => 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300',
                                'cancelled' => 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300',
                            ];
                        @endphp
                        <span class="px-3 py-1 {{ $statusColors[$session->status] ?? 'bg-gray-100' }} text-sm font-medium rounded-full">
                            {{ $session->status_arabic }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">التاريخ والوقت</p>
                    <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $session->scheduled_at->format('Y-m-d') }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $session->scheduled_at->format('H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">المدة</p>
                    <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $session->duration }} دقيقة</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">السعر</p>
                    <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $session->formatted_price }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">حالة الدفع</p>
                    <p class="text-lg font-bold text-gray-900 dark:text-white">
                        @if($session->payment_status === 'paid')
                            <span class="text-green-600 dark:text-green-400">مدفوع</span>
                        @elseif($session->payment_status === 'refunded')
                            <span class="text-orange-600 dark:text-orange-400">مسترد</span>
                        @else
                            <span class="text-yellow-600 dark:text-yellow-400">قيد الانتظار</span>
                        @endif
                    </p>
                </div>
            </div>

            @if($session->notes)
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-slate-700">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">ملاحظات</p>
                <p class="text-gray-900 dark:text-white">{{ $session->notes }}</p>
            </div>
            @endif

            @if($session->session_type === 'online' && $session->meeting_link)
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-slate-700">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">رابط الاجتماع</p>
                <a href="{{ $session->meeting_link }}" target="_blank" class="text-blue-600 hover:underline">{{ $session->meeting_link }}</a>
            </div>
            @endif

            @if($session->session_type === 'in-person' && $session->location)
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-slate-700">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">الموقع</p>
                <p class="text-gray-900 dark:text-white">{{ $session->location }}</p>
            </div>
            @endif

            @if($session->status === 'cancelled' && $session->cancellation_reason)
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-slate-700">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">سبب الإلغاء</p>
                <p class="text-gray-900 dark:text-white">{{ $session->cancellation_reason }}</p>
                @if($session->cancelledBy)
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">تم الإلغاء بواسطة: {{ $session->cancelledBy->name }}</p>
                @endif
            </div>
            @endif
        </div>

        <!-- Participants -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Teacher -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">مقدم الخدمة</h3>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                        {{ mb_substr($session->teacher->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $session->teacher->name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $session->teacher->email }}</p>
                        <a href="{{ route('admin.users.show', $session->teacher) }}" class="text-sm text-blue-600 hover:underline">عرض الملف الشخصي</a>
                    </div>
                </div>
            </div>

            <!-- Learner -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">المتعلم</h3>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                        {{ mb_substr($session->learner->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $session->learner->name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $session->learner->email }}</p>
                        <a href="{{ route('admin.users.show', $session->learner) }}" class="text-sm text-blue-600 hover:underline">عرض الملف الشخصي</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Review (Version 2 Feature) -->
        @if($session->status === 'completed')
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 relative overflow-hidden">
            <div class="absolute top-2 left-2">
                <span class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 text-xs font-bold rounded-full">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    قريباً
                </span>
            </div>
            <div class="opacity-60">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">التقييم</h3>
                <p class="text-gray-600 dark:text-gray-400">ميزة التقييمات ستكون متاحة في الإصدار الثاني</p>
            </div>
        </div>
        @endif

        <!-- Admin Actions -->
        @if($session->status !== 'completed' && $session->status !== 'cancelled')
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">إجراءات الإدارة</h3>
            <form method="POST" action="{{ route('admin.sessions.resolve', $session) }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الإجراء</label>
                    <select name="action" required class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white">
                        <option value="">اختر الإجراء</option>
                        <option value="complete">إكمال الجلسة</option>
                        <option value="cancel">إلغاء الجلسة</option>
                        <option value="refund">استرداد المبلغ</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">ملاحظات الحل</label>
                    <textarea name="resolution" required rows="3" class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white" placeholder="اكتب ملاحظات حول الإجراء المتخذ..."></textarea>
                </div>
                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors">
                    تنفيذ الإجراء
                </button>
            </form>
        </div>
        @endif
    </div>
</x-admin-layout>
