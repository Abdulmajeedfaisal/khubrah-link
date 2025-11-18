<x-admin-layout>
    <x-slot name="header">تفاصيل المستخدم</x-slot>

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

        <!-- User Info Card -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6">
                <div class="flex items-center gap-6">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-4xl font-bold text-blue-600">
                        {{ mb_substr($user->name, 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-white mb-2">{{ $user->name }}</h2>
                        <p class="text-blue-100 mb-3">{{ $user->email }}</p>
                        <div class="flex items-center gap-3">
                            @if($user->is_admin)
                            <span class="px-3 py-1 bg-red-500 text-white text-sm font-semibold rounded-full">
                                مدير النظام
                            </span>
                            @else
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold rounded-full">
                                {{ $user->is_provider ? 'مقدم خدمة' : 'متعلم' }}
                            </span>
                            @endif
                            <span class="px-3 py-1 {{ $user->is_active ? 'bg-green-500' : 'bg-yellow-500' }} text-white text-sm font-semibold rounded-full">
                                {{ $user->is_active ? 'نشط' : 'غير نشط' }}
                            </span>
                            @if($user->email_verified_at)
                            <span class="px-3 py-1 bg-blue-500 text-white text-sm font-semibold rounded-full">
                                ✓ موثق
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-100 text-sm mb-1">تاريخ التسجيل</p>
                        <p class="text-white font-semibold">{{ $user->created_at->format('Y-m-d') }}</p>
                        <p class="text-blue-100 text-xs mt-1">{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-4 divide-x divide-gray-200 dark:divide-slate-700 border-b border-gray-200 dark:border-slate-700">
                <div class="p-6 text-center">
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $userStats['total_sessions'] }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">إجمالي الجلسات</p>
                </div>
                <div class="p-6 text-center">
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $userStats['completed_sessions'] }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">جلسات مكتملة</p>
                </div>
                <div class="p-6 text-center">
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $userStats['skills_count'] }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">المهارات</p>
                </div>
                <div class="p-6 text-center relative">
                    <span class="absolute top-2 right-2 text-xs text-yellow-600 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-900/30 px-2 py-1 rounded-full">قريباً</span>
                    <p class="text-3xl font-bold text-gray-400 dark:text-gray-500 mb-1">--</p>
                    <p class="text-sm text-gray-400 dark:text-gray-500">التقييم</p>
                </div>
            </div>

            <!-- Details -->
            <div class="p-6 grid grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">رقم الهاتف</p>
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $user->phone ?? 'غير محدد' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">المدينة</p>
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $user->location ?? 'غير محدد' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">آخر تحديث</p>
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $user->updated_at->diffForHumans() }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">حالة البريد</p>
                    <p class="font-semibold {{ $user->email_verified_at ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        {{ $user->email_verified_at ? '✓ مفعّل' : '✗ غير مفعّل' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Skills & Bio -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Skills -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">المهارات ({{ $userStats['skills_count'] }})</h3>
                @if($user->skills->count() > 0)
                <div class="flex flex-wrap gap-2">
                    @foreach($user->skills as $skill)
                    <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-sm font-semibold">
                        {{ $skill->title }}
                    </span>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400">لا توجد مهارات مسجلة</p>
                @endif
            </div>

            <!-- Bio -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">نبذة تعريفية</h3>
                @if($user->bio)
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $user->bio }}</p>
                @else
                <p class="text-gray-500 dark:text-gray-400">لم يتم إضافة نبذة تعريفية</p>
                @endif
            </div>
        </div>

        <!-- Recent Sessions -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">الجلسات الأخيرة</h3>
            </div>
            <div class="divide-y divide-gray-200 dark:divide-slate-700">
                @forelse($recentSessions as $session)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="font-semibold text-gray-900 dark:text-white mb-1">{{ $session->skill->title }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                @if($session->teacher_id == $user->id)
                                    كمعلم مع: {{ $session->learner->name }}
                                @else
                                    كمتعلم مع: {{ $session->teacher->name }}
                                @endif
                            </p>
                        </div>
                        <div class="text-left">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">{{ $session->scheduled_at->format('Y-m-d') }}</p>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                @if($session->status == 'completed') bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400
                                @elseif($session->status == 'confirmed') bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400
                                @elseif($session->status == 'pending') bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400
                                @else bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400
                                @endif">
                                @if($session->status == 'completed') مكتملة
                                @elseif($session->status == 'confirmed') مؤكدة
                                @elseif($session->status == 'pending') معلقة
                                @else ملغاة
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                    <p>لا توجد جلسات</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">الإجراءات</h3>
            <div class="flex flex-wrap gap-3">
                @if(!$user->is_admin)
                    @if($user->is_active)
                    <form method="POST" action="{{ route('admin.users.suspend', $user) }}" class="inline" onsubmit="return confirm('هل أنت متأكد من تعليق هذا الحساب؟')">
                        @csrf
                        <button type="submit" class="px-6 py-3 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            تعليق الحساب
                        </button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('admin.users.activate', $user) }}" class="inline">
                        @csrf
                        <button type="submit" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            تفعيل الحساب
                        </button>
                    </form>
                    @endif

                    <button onclick="alert('⏳ ميزة المراسلة قيد التطوير وستكون متاحة في الإصدار الثاني')" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2 opacity-60">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        إرسال رسالة
                        <span class="text-xs bg-yellow-500 px-2 py-0.5 rounded-full">قريباً</span>
                    </button>

                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟\n\nتحذير: هذا الإجراء لا يمكن التراجع عنه!')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            حذف الحساب
                        </button>
                    </form>
                @else
                    <div class="px-6 py-3 bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-400 font-semibold rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        حساب محمي - لا يمكن تعديله
                    </div>
                @endif

                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    العودة للقائمة
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
