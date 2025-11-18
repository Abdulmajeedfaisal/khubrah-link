<x-admin-layout>
    <x-slot name="header">الملف الشخصي</x-slot>

    <div class="space-y-6">
        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900/30 border border-green-500 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-100 dark:bg-red-900/30 border border-red-500 text-red-700 dark:text-red-400 px-4 py-3 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Profile Info Card -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
            <div class="bg-gradient-to-r from-red-500 to-orange-600 p-6">
                <div class="flex items-center gap-6">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-4xl font-bold text-red-600">
                        {{ mb_substr($admin->name, 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-white mb-2">{{ $admin->name }}</h2>
                        <p class="text-red-100 mb-3">{{ $admin->email }}</p>
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 bg-white text-red-600 text-sm font-semibold rounded-full">
                                مدير النظام
                            </span>
                            @if($admin->email_verified_at)
                            <span class="px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full">
                                ✓ موثق
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-red-100 text-sm mb-1">عضو منذ</p>
                        <p class="text-white font-semibold">{{ $admin->created_at->format('Y-m-d') }}</p>
                        <p class="text-red-100 text-xs mt-1">{{ $admin->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Profile Form -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">تحديث المعلومات الشخصية</h3>
            
            <form method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            الاسم
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $admin->name) }}" 
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            البريد الإلكتروني
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $admin->email) }}" 
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                            حفظ التغييرات
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Update Password Form -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">تغيير كلمة المرور</h3>
            
            <form method="POST" action="{{ route('admin.profile.password') }}">
                @csrf
                @method('PATCH')

                <div class="space-y-4">
                    <!-- Current Password -->
                    <div>
                        <label for="current_password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            كلمة المرور الحالية
                        </label>
                        <input type="password" 
                               id="current_password" 
                               name="current_password" 
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            كلمة المرور الجديدة
                        </label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">يجب أن تكون 8 أحرف على الأقل</p>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            تأكيد كلمة المرور
                        </label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                            تحديث كلمة المرور
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Account Info -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">معلومات الحساب</h3>
            
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">تاريخ الإنشاء</p>
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $admin->created_at->format('Y-m-d H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">آخر تحديث</p>
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $admin->updated_at->diffForHumans() }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">حالة البريد</p>
                    <p class="font-semibold {{ $admin->email_verified_at ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        {{ $admin->email_verified_at ? '✓ مفعّل' : '✗ غير مفعّل' }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">الصلاحيات</p>
                    <p class="font-semibold text-red-600 dark:text-red-400">مدير - صلاحيات كاملة</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
