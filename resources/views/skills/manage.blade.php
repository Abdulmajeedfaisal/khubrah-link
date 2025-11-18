<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
                    إدارة مهاراتي
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    أضف المهارات التي تريد تعليمها أو تعلمها
                </p>
            </div>
            <button @click="$dispatch('open-add-modal')" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                أضف مهارة جديدة
            </button>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ showAddModal: {{ $errors->any() ? 'true' : 'false' }}, skillType: 'teach' }" @open-add-modal.window="showAddModal = true">
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg flex items-center gap-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg flex items-center gap-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Tabs -->
        <div class="mb-8">
            <div class="border-b border-gray-200 dark:border-slate-700">
                <nav class="-mb-px flex gap-8">
                    <button @click="skillType = 'teach'" :class="skillType === 'teach' ? 'border-primary-600 text-primary-600 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600'" class="whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm transition-colors">
                        المهارات التي أقدمها ({{ $mySkills->count() }})
                    </button>
                    <button @click="skillType = 'learn'" :class="skillType === 'learn' ? 'border-primary-600 text-primary-600 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600'" class="whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm transition-colors">
                        المهارات التي أتعلمها (0)
                    </button>
                </nav>
            </div>
        </div>

        <!-- Teaching Skills -->
        <div x-show="skillType === 'teach'" class="space-y-6">
            @forelse($mySkills as $skill)
            <!-- Skill Card -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $skill->title }}</h3>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs rounded-full font-medium">{{ $skill->category->name_ar }}</span>
                                    <span class="px-2 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs rounded-full font-medium">{{ $skill->level_ar }}</span>
                                    <span class="px-2 py-1 {{ $skill->is_active ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300' : 'bg-gray-100 dark:bg-gray-900/30 text-gray-700 dark:text-gray-300' }} text-xs rounded-full font-medium">
                                        {{ $skill->is_active ? 'نشط' : 'غير نشط' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($skill->description, 150) }}</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                            @if($skill->location)
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                {{ $skill->location }}
                            </div>
                            @endif
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                                {{ $skill->session_type_ar }}
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $skill->session_duration }} دقيقة
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                @if($skill->price_per_hour)
                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                                    </svg>
                                    {{ number_format($skill->price_per_hour) }} ر.س/ساعة
                                @else
                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    مجاناً
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mr-4">
                        <a href="{{ route('skills.show', $skill) }}" class="p-2 text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition-colors" title="عرض">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                        <button @click="$dispatch('open-edit-modal', { skill: {{ $skill->toJson() }} })" class="p-2 text-gray-600 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition-colors" title="تعديل">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <form method="POST" action="{{ route('skills.toggle', $skill) }}" class="inline">
                            @csrf
                            <button type="submit" class="p-2 text-gray-600 dark:text-gray-400 hover:text-yellow-600 dark:hover:text-yellow-400 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition-colors" title="{{ $skill->is_active ? 'تعطيل' : 'تفعيل' }}">
                                @if($skill->is_active)
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
                        <form method="POST" action="{{ route('skills.destroy', $skill) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه المهارة؟')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition-colors" title="حذف">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="text-center py-12 bg-white dark:bg-slate-800 rounded-2xl border-2 border-dashed border-gray-300 dark:border-slate-700">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">لا توجد مهارات للتعليم</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">ابدأ بإضافة مهاراتك التي تريد تعليمها للآخرين</p>
                <button @click="showAddModal = true" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2.5 rounded-xl font-semibold transition-all">
                    أضف مهارة جديدة
                </button>
            </div>
            @endforelse
        </div>

        <!-- Learning Skills -->
        <div x-show="skillType === 'learn'" class="space-y-6">
            <div class="text-center py-12 bg-white dark:bg-slate-800 rounded-2xl border-2 border-dashed border-gray-300 dark:border-slate-700">
                <div class="w-16 h-16 mx-auto mb-4 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">⏳ قيد التطوير</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">هذه الميزة ستكون متاحة في الإصدار الثاني</p>
                <p class="text-sm text-gray-500 dark:text-gray-500 mb-4">يمكنك عرض جلساتك المحجوزة من صفحة "جلساتي"</p>
                <a href="{{ route('sessions.index') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white px-6 py-2.5 rounded-xl font-semibold transition-all">
                    عرض جلساتي
                </a>
            </div>
        </div>

        <!-- Add Skill Modal -->
        <div x-show="showAddModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div @click="showAddModal = false" class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>
                
                <div class="relative bg-white dark:bg-slate-800 rounded-2xl shadow-2xl max-w-2xl w-full p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">أضف مهارة جديدة</h3>
                        <button @click="showAddModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('skills.store') }}" class="space-y-6">
                        @csrf

                        <!-- Skill Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">اسم المهارة *</label>
                            <input type="text" name="title" value="{{ old('title') }}" required placeholder="مثال: تطوير تطبيقات الويب بـ Laravel" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            @error('title')
                                <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category & Level -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الفئة *</label>
                                <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                    <option value="">اختر الفئة</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">المستوى *</label>
                                <select name="level" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                    <option value="">اختر المستوى</option>
                                    <option value="beginner">مبتدئ</option>
                                    <option value="intermediate">متوسط</option>
                                    <option value="advanced">متقدم</option>
                                    <option value="expert">خبير</option>
                                </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الوصف *</label>
                            <textarea name="description" required rows="4" placeholder="اكتب وصفاً مختصراً عن المهارة..." class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price & Duration -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">السعر/ساعة (ر.س)</label>
                                <input type="number" name="price_per_hour" step="0.01" min="0" placeholder="0 للمجاني" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">مدة الجلسة (دقيقة) *</label>
                                <input type="number" name="session_duration" required value="60" min="15" step="15" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>
                        </div>

                        <!-- Location & Session Type -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الموقع</label>
                                <input type="text" name="location" placeholder="مثال: الرياض" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">نوع الجلسة *</label>
                                <select name="session_type" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                    <option value="both">حضوري وعن بُعد</option>
                                    <option value="online">عن بُعد فقط</option>
                                    <option value="in-person">حضوري فقط</option>
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                                حفظ المهارة
                            </button>
                            <button type="button" @click="showAddModal = false" class="px-6 py-3 border border-gray-300 dark:border-slate-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-slate-700 transition-all">
                                إلغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Skill Modal -->
        <div x-data="{ 
            showEditModal: false, 
            editSkill: null 
        }" 
        @open-edit-modal.window="showEditModal = true; editSkill = $event.detail.skill"
        x-show="showEditModal" 
        x-cloak 
        class="fixed inset-0 z-50 overflow-y-auto" 
        style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div @click="showEditModal = false" class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>
                
                <div class="relative bg-white dark:bg-slate-800 rounded-2xl shadow-2xl max-w-2xl w-full p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">تعديل المهارة</h3>
                        <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <form :action="editSkill ? '{{ url('/skills') }}/' + editSkill.id : ''" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Skill Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">اسم المهارة *</label>
                            <input type="text" name="title" :value="editSkill?.title" required placeholder="مثال: تطوير تطبيقات الويب بـ Laravel" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>

                        <!-- Category & Level -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الفئة *</label>
                                <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                    <option value="">اختر الفئة</option>
                                    @foreach($categories as $category)
                                        <option :value="{{ $category->id }}" :selected="editSkill?.category_id == {{ $category->id }}">{{ $category->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">المستوى *</label>
                                <select name="level" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                    <option value="">اختر المستوى</option>
                                    <option value="beginner" :selected="editSkill?.level === 'beginner'">مبتدئ</option>
                                    <option value="intermediate" :selected="editSkill?.level === 'intermediate'">متوسط</option>
                                    <option value="advanced" :selected="editSkill?.level === 'advanced'">متقدم</option>
                                    <option value="expert" :selected="editSkill?.level === 'expert'">خبير</option>
                                </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الوصف *</label>
                            <textarea name="description" required rows="4" placeholder="اكتب وصفاً مختصراً عن المهارة..." class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500" x-text="editSkill?.description"></textarea>
                        </div>

                        <!-- Price & Duration -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">السعر/ساعة (ر.س)</label>
                                <input type="number" name="price_per_hour" step="0.01" min="0" :value="editSkill?.price_per_hour" placeholder="0 للمجاني" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">مدة الجلسة (دقيقة) *</label>
                                <input type="number" name="session_duration" required :value="editSkill?.session_duration" min="15" step="15" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>
                        </div>

                        <!-- Location & Session Type -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الموقع</label>
                                <input type="text" name="location" :value="editSkill?.location" placeholder="مثال: الرياض" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">نوع الجلسة *</label>
                                <select name="session_type" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                    <option value="both" :selected="editSkill?.session_type === 'both'">حضوري وعن بُعد</option>
                                    <option value="online" :selected="editSkill?.session_type === 'online'">عن بُعد فقط</option>
                                    <option value="in-person" :selected="editSkill?.session_type === 'in-person'">حضوري فقط</option>
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                                حفظ التعديلات
                            </button>
                            <button type="button" @click="showEditModal = false" class="px-6 py-3 border border-gray-300 dark:border-slate-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-slate-700 transition-all">
                                إلغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
