<x-admin-layout>
    <x-slot name="header">إعدادات النظام</x-slot>

    <div class="space-y-6">
        <!-- Coming Soon Notice -->
        <div class="bg-yellow-50 dark:bg-yellow-900/20 border-r-4 border-yellow-400 dark:border-yellow-600 p-6 rounded-lg">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-yellow-800 dark:text-yellow-300 mb-2">
                        قيد التطوير - الإصدار الثاني
                    </h3>
                    <p class="text-yellow-700 dark:text-yellow-400 leading-relaxed">
                        هذه الصفحة حالياً للعرض فقط. جميع الإعدادات والوظائف الموجودة هنا ستكون متاحة وقابلة للتعديل في الإصدار الثاني من المنصة. 
                        حالياً، يتم إدارة إعدادات النظام من خلال ملف <code class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900/40 rounded text-sm">.env</code>.
                    </p>
                </div>
            </div>
        </div>

        <!-- General Settings -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">الإعدادات العامة</h3>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            اسم المنصة
                        </label>
                        <input type="text" 
                               value="Khubrah-Link"
                               disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            البريد الإلكتروني للدعم
                        </label>
                        <input type="email" 
                               value="support@khubrah-link.com"
                               disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        وصف المنصة
                    </label>
                    <textarea rows="4"
                              disabled
                              class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">منصة مجتمعية لتبادل المهارات P2P بين الأفراد في المجتمع المحلي</textarea>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg opacity-60">
                    <div>
                        <p class="font-semibold text-gray-900 dark:text-white">السماح بالتسجيل الجديد</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">السماح للمستخدمين الجدد بإنشاء حسابات</p>
                    </div>
                    <div class="w-11 h-6 bg-green-400 dark:bg-green-600 rounded-full relative">
                        <div class="absolute top-[2px] left-[22px] bg-white border-gray-300 border rounded-full h-5 w-5"></div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg opacity-60">
                    <div>
                        <p class="font-semibold text-gray-900 dark:text-white">وضع الصيانة</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">تعطيل الموقع مؤقتاً للصيانة</p>
                    </div>
                    <div class="w-11 h-6 bg-gray-300 dark:bg-gray-600 rounded-full relative">
                        <div class="absolute top-[2px] left-[2px] bg-white border-gray-300 border rounded-full h-5 w-5"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Email Settings -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">إعدادات البريد الإلكتروني</h3>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            SMTP Host
                        </label>
                        <input type="text" 
                               value="smtp.mailtrap.io"
                               disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            SMTP Port
                        </label>
                        <input type="text" 
                               value="2525"
                               disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            SMTP Username
                        </label>
                        <input type="text" 
                               value="username"
                               disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            SMTP Password
                        </label>
                        <input type="password" 
                               value="••••••••"
                               disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    </div>
                </div>

                <div class="flex gap-3">
                    <button disabled class="px-6 py-3 bg-gray-400 text-white font-semibold rounded-lg cursor-not-allowed opacity-60">
                        اختبار الاتصال (غير متاح)
                    </button>
                </div>
            </div>
        </div>

        <!-- Notification Settings -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">إعدادات الإشعارات</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg opacity-60">
                    <div>
                        <p class="font-semibold text-gray-900 dark:text-white">إشعارات المستخدمين الجدد</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">إرسال إشعار عند تسجيل مستخدم جديد</p>
                    </div>
                    <div class="w-11 h-6 bg-green-400 dark:bg-green-600 rounded-full relative">
                        <div class="absolute top-[2px] left-[22px] bg-white border-gray-300 border rounded-full h-5 w-5"></div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg opacity-60">
                    <div>
                        <p class="font-semibold text-gray-900 dark:text-white">إشعارات البلاغات</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">إرسال إشعار عند استلام بلاغ جديد</p>
                    </div>
                    <div class="w-11 h-6 bg-green-400 dark:bg-green-600 rounded-full relative">
                        <div class="absolute top-[2px] left-[22px] bg-white border-gray-300 border rounded-full h-5 w-5"></div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg opacity-60">
                    <div>
                        <p class="font-semibold text-gray-900 dark:text-white">إشعارات الجلسات</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">إرسال إشعار عند حجز جلسة جديدة</p>
                    </div>
                    <div class="w-11 h-6 bg-green-400 dark:bg-green-600 rounded-full relative">
                        <div class="absolute top-[2px] left-[22px] bg-white border-gray-300 border rounded-full h-5 w-5"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Settings -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">إعدادات الأمان</h3>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            مدة الجلسة (بالدقائق)
                        </label>
                        <input type="number" 
                               value="120"
                               disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            الحد الأقصى لمحاولات تسجيل الدخول
                        </label>
                        <input type="number" 
                               value="5"
                               disabled
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-slate-600 bg-gray-100 dark:bg-slate-700/50 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg opacity-60">
                    <div>
                        <p class="font-semibold text-gray-900 dark:text-white">المصادقة الثنائية (2FA)</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">تفعيل المصادقة الثنائية للمسؤولين</p>
                    </div>
                    <div class="w-11 h-6 bg-gray-300 dark:bg-gray-600 rounded-full relative">
                        <div class="absolute top-[2px] left-[2px] bg-white border-gray-300 border rounded-full h-5 w-5"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button (Disabled) -->
        <div class="flex justify-end gap-3">
            <button disabled class="px-6 py-3 bg-gray-400 text-white font-semibold rounded-lg cursor-not-allowed opacity-60">
                إلغاء
            </button>
            <button disabled class="px-6 py-3 bg-gray-400 text-white font-semibold rounded-lg cursor-not-allowed opacity-60 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                حفظ التغييرات (غير متاح)
            </button>
        </div>
    </div>
</x-admin-layout>
