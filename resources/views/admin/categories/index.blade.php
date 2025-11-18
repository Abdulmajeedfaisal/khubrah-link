<x-admin-layout>
    <x-slot name="header">إدارة فئات المهارات</x-slot>

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
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">إجمالي الفئات</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ $categories->count() }}</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">الفئات النشطة</p>
                <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $categories->where('is_active', true)->count() }}</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">إجمالي المهارات</p>
                <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{ $categories->sum('skills_count') }}</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">الأكثر مهارات</p>
                @php
                    $topCategory = $categories->sortByDesc('skills_count')->first();
                @endphp
                <p class="text-2xl font-bold text-purple-600 dark:text-purple-400 mt-2">
                    {{ $topCategory ? $topCategory->name_ar : '-' }}
                </p>
            </div>
        </div>

        <!-- Add/Edit Category Buttons -->
        <div class="flex justify-end" x-data="{ 
            showModal: false, 
            showEditModal: false, 
            editCategory: null,
            openEdit(id) {
                this.editCategory = id;
                this.showEditModal = true;
            }
        }">
            <button @click="showModal = true" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                إضافة فئة جديدة
            </button>

            <!-- Add Category Modal -->
            <div x-show="showModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div @click="showModal = false" class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>
                    
                    <div class="relative bg-white dark:bg-slate-800 rounded-2xl shadow-2xl max-w-2xl w-full p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">إضافة فئة جديدة</h3>
                            <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-6">
                            @csrf
                            
                            <!-- Arabic Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الاسم بالعربي *</label>
                                <input type="text" name="name_ar" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>

                            <!-- English Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الاسم بالإنجليزي *</label>
                                <input type="text" name="name_en" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>

                            <!-- Icon & Color -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الأيقونة</label>
                                    <select name="icon" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                        <option value="code">💻 برمجة وتقنية</option>
                                        <option value="paint-brush">🎨 فنون وحرف</option>
                                        <option value="language">🌍 لغات</option>
                                        <option value="academic">📚 تعليم وتدريس</option>
                                        <option value="trophy">🏆 رياضة ولياقة</option>
                                        <option value="cake">🍰 طبخ ومأكولات</option>
                                        <option value="camera">📷 تصوير</option>
                                        <option value="music">🎵 موسيقى</option>
                                        <option value="tag">🏷️ عام</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">اللون</label>
                                    <select name="color" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                        <option value="blue">أزرق</option>
                                        <option value="green">أخضر</option>
                                        <option value="purple">بنفسجي</option>
                                        <option value="red">أحمر</option>
                                        <option value="yellow">أصفر</option>
                                        <option value="pink">وردي</option>
                                        <option value="indigo">نيلي</option>
                                        <option value="orange">برتقالي</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الوصف</label>
                                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500"></textarea>
                            </div>

                            <!-- Order -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الترتيب</label>
                                <input type="number" name="order" value="0" min="0" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>

                            <!-- Buttons -->
                            <div class="flex gap-3 pt-4">
                                <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                                    حفظ الفئة
                                </button>
                                <button type="button" @click="showModal = false" class="px-6 py-3 border border-gray-300 dark:border-slate-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-slate-700 transition-all">
                                    إلغاء
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Category Modal -->
            <div x-show="showEditModal" 
                 @open-edit.window="openEdit($event.detail.id)"
                 x-cloak 
                 class="fixed inset-0 z-50 overflow-y-auto" 
                 style="display: none;">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div @click="showEditModal = false" class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>
                    
                    <div class="relative bg-white dark:bg-slate-800 rounded-2xl shadow-2xl max-w-2xl w-full p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">تعديل الفئة</h3>
                            <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        @foreach($categories as $cat)
                        <form x-show="editCategory === {{ $cat->id }}" 
                              method="POST" 
                              action="{{ route('admin.categories.update', $cat) }}" 
                              class="space-y-6"
                              style="display: none;">
                            @csrf
                            @method('PUT')
                            
                            <!-- Arabic Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الاسم بالعربي *</label>
                                <input type="text" name="name_ar" value="{{ $cat->name_ar }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>

                            <!-- English Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الاسم بالإنجليزي *</label>
                                <input type="text" name="name_en" value="{{ $cat->name_en }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>

                            <!-- Icon & Color -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الأيقونة</label>
                                    <select name="icon" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                        <option value="code" {{ $cat->icon == 'code' ? 'selected' : '' }}>💻 برمجة وتقنية</option>
                                        <option value="paint-brush" {{ $cat->icon == 'paint-brush' ? 'selected' : '' }}>🎨 فنون وحرف</option>
                                        <option value="language" {{ $cat->icon == 'language' ? 'selected' : '' }}>🌍 لغات</option>
                                        <option value="academic" {{ $cat->icon == 'academic' ? 'selected' : '' }}>📚 تعليم وتدريس</option>
                                        <option value="trophy" {{ $cat->icon == 'trophy' ? 'selected' : '' }}>🏆 رياضة ولياقة</option>
                                        <option value="cake" {{ $cat->icon == 'cake' ? 'selected' : '' }}>🍰 طبخ ومأكولات</option>
                                        <option value="camera" {{ $cat->icon == 'camera' ? 'selected' : '' }}>📷 تصوير</option>
                                        <option value="music" {{ $cat->icon == 'music' ? 'selected' : '' }}>🎵 موسيقى</option>
                                        <option value="tag" {{ $cat->icon == 'tag' ? 'selected' : '' }}>🏷️ عام</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">اللون</label>
                                    <select name="color" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                                        <option value="blue" {{ $cat->color == 'blue' ? 'selected' : '' }}>أزرق</option>
                                        <option value="green" {{ $cat->color == 'green' ? 'selected' : '' }}>أخضر</option>
                                        <option value="purple" {{ $cat->color == 'purple' ? 'selected' : '' }}>بنفسجي</option>
                                        <option value="red" {{ $cat->color == 'red' ? 'selected' : '' }}>أحمر</option>
                                        <option value="yellow" {{ $cat->color == 'yellow' ? 'selected' : '' }}>أصفر</option>
                                        <option value="pink" {{ $cat->color == 'pink' ? 'selected' : '' }}>وردي</option>
                                        <option value="indigo" {{ $cat->color == 'indigo' ? 'selected' : '' }}>نيلي</option>
                                        <option value="orange" {{ $cat->color == 'orange' ? 'selected' : '' }}>برتقالي</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الوصف</label>
                                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">{{ $cat->description }}</textarea>
                            </div>

                            <!-- Order -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">الترتيب</label>
                                <input type="number" name="order" value="{{ $cat->order }}" min="0" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($categories as $category)
            @php
                // تحديد الألوان بشكل ثابت لضمان عملها
                $colorMap = [
                    'blue' => 'from-blue-500 to-blue-600',
                    'green' => 'from-green-500 to-green-600',
                    'purple' => 'from-purple-500 to-purple-600',
                    'red' => 'from-red-500 to-red-600',
                    'yellow' => 'from-yellow-500 to-yellow-600',
                    'pink' => 'from-pink-500 to-pink-600',
                    'indigo' => 'from-indigo-500 to-indigo-600',
                    'orange' => 'from-orange-500 to-orange-600',
                ];
                $gradient = $colorMap[$category->color ?? 'blue'] ?? $colorMap['blue'];
            @endphp
            <!-- Category Card -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="bg-gradient-to-r {{ $gradient }} p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                @switch($category->icon)
                                    @case('code')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                        </svg>
                                        @break
                                    @case('paint-brush')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                        </svg>
                                        @break
                                    @case('language')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                                        </svg>
                                        @break
                                    @case('academic')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                        @break
                                    @case('trophy')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                        </svg>
                                        @break
                                    @case('cake')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                        </svg>
                                        @break
                                    @case('camera')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        @break
                                    @case('music')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                        </svg>
                                        @break
                                    @default
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                @endswitch
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">{{ $category->name_ar }}</h3>
                                <p class="text-white/80 text-sm">{{ $category->name_en }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <!-- Stats Row -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600 dark:text-gray-400">المهارات:</span>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">{{ $category->skills_count }}</span>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $category->is_active ? 'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400' : 'bg-gray-100 dark:bg-gray-900/30 text-gray-600 dark:text-gray-400' }}">
                            {{ $category->is_active ? 'نشط' : 'غير نشط' }}
                        </span>
                    </div>
                    
                    <!-- Actions Row -->
                    <div class="grid grid-cols-3 gap-2">
                        <!-- Edit Button -->
                        <button @click="$dispatch('open-edit', { id: {{ $category->id }} })" 
                                class="px-3 py-2 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors font-semibold text-sm text-center">
                            تعديل
                        </button>
                        
                        <!-- Toggle Status -->
                        <form method="POST" action="{{ route('admin.categories.toggle', $category) }}">
                            @csrf
                            <button type="submit" class="w-full px-3 py-2 {{ $category->is_active ? 'bg-yellow-50 dark:bg-yellow-900/20 text-yellow-600 dark:text-yellow-400' : 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400' }} rounded-lg hover:opacity-80 transition-colors font-semibold text-sm">
                                {{ $category->is_active ? 'تعطيل' : 'تفعيل' }}
                            </button>
                        </form>
                        
                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه الفئة؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-3 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors font-semibold text-sm">
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
                <p class="text-gray-600 dark:text-gray-400 text-lg font-semibold">لا توجد فئات بعد</p>
                <p class="text-gray-500 dark:text-gray-500 text-sm mt-2">ابدأ بإضافة فئة جديدة</p>
            </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>