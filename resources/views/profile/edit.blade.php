<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
                    تعديل الملف الشخصي
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    قم بتحديث معلوماتك الشخصية وإعدادات حسابك
                </p>
            </div>
            <a href="{{ route('profile.show') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                العودة للملف الشخصي
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Success Message -->
        @if(session('status') === 'profile-updated')
            <div class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg flex items-center gap-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>تم تحديث الملف الشخصي بنجاح!</span>
            </div>
        @endif

        <div class="space-y-6">
            
            <!-- Profile Information -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    المعلومات الشخصية
                </h3>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Avatar Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            الصورة الشخصية
                        </label>
                        <div class="flex items-center gap-6" x-data="{ 
                            photoPreview: null,
                            photoName: null,
                            updatePhotoPreview() {
                                const photo = $refs.photo.files[0];
                                if (!photo) return;
                                
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    this.photoPreview = e.target.result;
                                };
                                reader.readAsDataURL(photo);
                                this.photoName = photo.name;
                            }
                        }">
                            <!-- Current/Preview Avatar -->
                            <div class="relative">
                                @if($user->avatar)
                                    <img x-show="!photoPreview" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-24 h-24 rounded-full object-cover border-4 border-gray-200 dark:border-slate-700">
                                @else
                                    <div x-show="!photoPreview" class="w-24 h-24 bg-gradient-to-br from-primary-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-4xl border-4 border-gray-200 dark:border-slate-700">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                @endif
                                <img x-show="photoPreview" :src="photoPreview" class="w-24 h-24 rounded-full object-cover border-4 border-primary-500" style="display: none;">
                            </div>

                            <div class="flex-1">
                                <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden" x-ref="photo" @change="updatePhotoPreview()">
                                <div class="flex items-center gap-3">
                                    <label for="avatar" class="cursor-pointer bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-semibold transition-colors text-sm">
                                        اختر صورة
                                    </label>
                                    @if($user->avatar)
                                        <button type="button" @click="$refs.photo.value = null; photoPreview = null; $refs.removeAvatar.value = '1'" class="text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-semibold text-sm">
                                            حذف الصورة
                                        </button>
                                        <input type="hidden" name="remove_avatar" x-ref="removeAvatar" value="0">
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                    JPG, PNG أو GIF (الحد الأقصى 2MB)
                                </p>
                                <p x-show="photoName" x-text="photoName" class="text-xs text-primary-600 dark:text-primary-400 mt-1"></p>
                                @error('avatar')
                                    <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Name & Username -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                الاسم الكامل <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            @error('name')
                                <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="username" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                اسم المستخدم <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500 dark:text-gray-400">@</span>
                                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required class="w-full px-4 py-3 pl-8 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            </div>
                            @error('username')
                                <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            البريد الإلكتروني <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        @error('email')
                            <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                        @if($user->email_verified_at)
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                البريد الإلكتروني موثق
                            </p>
                        @endif
                    </div>

                    <!-- Bio -->
                    <div>
                        <label for="bio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            نبذة عني
                        </label>
                        <textarea name="bio" id="bio" rows="4" placeholder="أخبر الآخرين عن نفسك، خبراتك، واهتماماتك..." class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500 resize-none">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                            <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location & Phone -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                الموقع
                            </label>
                            <input type="text" name="location" id="location" value="{{ old('location', $user->location) }}" placeholder="مثال: الرياض، السعودية" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            @error('location')
                                <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                رقم الهاتف
                            </label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" placeholder="05xxxxxxxx" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                            @error('phone')
                                <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                        <a href="{{ route('profile.show') }}" class="px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl font-semibold transition-colors">
                            إلغاء
                        </a>
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-primary-600/30">
                            حفظ التغييرات
                        </button>
                    </div>
                </form>
            </div>

            <!-- Update Password -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    تغيير كلمة المرور
                </h3>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            كلمة المرور الحالية <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="current_password" id="current_password" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        @error('current_password', 'updatePassword')
                            <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            كلمة المرور الجديدة <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" id="password" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        @error('password', 'updatePassword')
                            <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            تأكيد كلمة المرور <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                        @error('password_confirmation', 'updatePassword')
                            <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    @if(session('status') === 'password-updated')
                        <div class="bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg flex items-center gap-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>تم تحديث كلمة المرور بنجاح!</span>
                        </div>
                    @endif

                    <div class="flex items-center justify-end pt-4 border-t border-gray-200 dark:border-slate-700">
                        <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                            تحديث كلمة المرور
                        </button>
                    </div>
                </form>
            </div>

            <!-- Delete Account -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-red-200 dark:border-red-900 p-6">
                <h3 class="text-xl font-bold text-red-600 dark:text-red-400 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    حذف الحساب
                </h3>

                <div class="mb-6">
                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                        بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته بشكل دائم. قبل حذف حسابك، يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها.
                    </p>
                </div>

                <form method="POST" action="{{ route('profile.destroy') }}" x-data="{ showConfirm: false }">
                    @csrf
                    @method('DELETE')

                    <button type="button" @click="showConfirm = true" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                        حذف الحساب
                    </button>

                    <!-- Confirmation Modal -->
                    <div x-show="showConfirm" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                        <div class="flex items-center justify-center min-h-screen px-4">
                            <div class="fixed inset-0 bg-black opacity-50" @click="showConfirm = false"></div>
                            
                            <div class="relative bg-white dark:bg-slate-800 rounded-2xl shadow-xl max-w-md w-full p-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                                    هل أنت متأكد من حذف حسابك؟
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-6">
                                    بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته بشكل دائم. يرجى إدخال كلمة المرور الخاصة بك لتأكيد رغبتك في حذف حسابك نهائياً.
                                </p>

                                <div class="mb-6">
                                    <label for="password_delete" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                        كلمة المرور
                                    </label>
                                    <input type="password" name="password" id="password_delete" required class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-700 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-red-500">
                                    @error('password', 'userDeletion')
                                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-end gap-4">
                                    <button type="button" @click="showConfirm = false" class="px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-xl font-semibold transition-colors">
                                        إلغاء
                                    </button>
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold transition-all">
                                        حذف الحساب
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
