<x-admin-layout>
    <x-slot name="header">تفاصيل المهارة</x-slot>

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
            <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition-colors">
                العودة للقائمة
            </a>
        </div>

        <!-- Skill Info -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $skill->title }}</h2>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-medium rounded-full">
                            {{ $skill->category->name_ar }}
                        </span>
                        <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-sm font-medium rounded-full">
                            {{ $skill->level_arabic }}
                        </span>
                        <span class="px-3 py-1 {{ $skill->is_active ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300' : 'bg-gray-100 dark:bg-gray-900/30 text-gray-700 dark:text-gray-300' }} text-sm font-medium rounded-full">
                            {{ $skill->is_active ? 'نشط' : 'غير نشط' }}
                        </span>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $skill->description }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">السعر/ساعة</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $skill->formatted_price }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">مدة الجلسة</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $skill->session_duration }} دقيقة</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">نوع الجلسة</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $skill->session_type_arabic }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">الموقع</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $skill->location ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Provider Info -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">معلومات المدرب</h3>
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                    {{ mb_substr($skill->user->name, 0, 1) }}
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $skill->user->name }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $skill->user->email }}</p>
                    <a href="{{ route('admin.users.show', $skill->user) }}" class="text-sm text-blue-600 hover:underline">عرض الملف الشخصي</a>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">عدد الجلسات</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $skill->sessions->count() }}</p>
            </div>
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
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">عدد المشاهدات</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">--</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">الإصدار الثاني</p>
                </div>
            </div>
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
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">متوسط التقييم</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">--</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">الإصدار الثاني</p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex gap-3">
            <form method="POST" action="{{ route('admin.skills.toggle', $skill) }}">
                @csrf
                <button type="submit" class="px-6 py-3 {{ $skill->is_active ? 'bg-yellow-600 hover:bg-yellow-700' : 'bg-green-600 hover:bg-green-700' }} text-white rounded-lg font-semibold transition-colors">
                    {{ $skill->is_active ? 'تعطيل المهارة' : 'تفعيل المهارة' }}
                </button>
            </form>
            <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه المهارة؟')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition-colors">
                    حذف المهارة
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
