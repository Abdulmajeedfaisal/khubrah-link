<x-app-layout>
    <x-back-to-top />
    <x-back-button />
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">سياسة الخصوصية</h1>
            <p class="text-gray-600 dark:text-gray-400">آخر تحديث: {{ date('Y/m/d') }}</p>
        </div>

        <!-- Content -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-8 space-y-8">
            <!-- Introduction -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">مقدمة</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    نحن في خبرة لينك نحترم خصوصيتك ونلتزم بحماية بياناتك الشخصية. توضح هذه السياسة كيفية جمع واستخدام وحماية معلوماتك.
                </p>
            </div>

            <!-- Section 1 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">1. المعلومات التي نجمعها</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-3">
                    نقوم بجمع المعلومات التالية:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li><strong>معلومات الحساب:</strong> الاسم، البريد الإلكتروني، رقم الهاتف</li>
                    <li><strong>معلومات الملف الشخصي:</strong> السيرة الذاتية، المهارات، الصورة الشخصية، الموقع</li>
                    <li><strong>معلومات الاستخدام:</strong> سجل التصفح، الجلسات، التقييمات، الرسائل</li>
                    <li><strong>معلومات تقنية:</strong> عنوان IP، نوع المتصفح، نظام التشغيل</li>
                </ul>
            </div>

            <!-- Section 2 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">2. كيفية استخدام المعلومات</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-3">
                    نستخدم معلوماتك من أجل:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li>توفير وتحسين خدماتنا</li>
                    <li>التواصل معك بخصوص حسابك والجلسات</li>
                    <li>تسهيل التواصل بين المستخدمين</li>
                    <li>تخصيص تجربتك على المنصة</li>
                    <li>ضمان الأمان ومنع الاحتيال</li>
                    <li>الامتثال للمتطلبات القانونية</li>
                </ul>
            </div>

            <!-- Section 3 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">3. مشاركة المعلومات</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-3">
                    نحن لا نبيع معلوماتك الشخصية. قد نشارك معلوماتك مع:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li><strong>المستخدمين الآخرين:</strong> المعلومات الأساسية في ملفك الشخصي العام</li>
                    <li><strong>مزودي الخدمات:</strong> شركات الاستضافة والتحليلات</li>
                    <li><strong>الجهات القانونية:</strong> عند الطلب القانوني أو لحماية حقوقنا</li>
                </ul>
            </div>

            <!-- Section 4 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">4. حماية المعلومات</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-3">
                    نتخذ إجراءات أمنية صارمة لحماية بياناتك:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li>تشفير البيانات أثناء النقل والتخزين</li>
                    <li>جدران حماية وأنظمة كشف التسلل</li>
                    <li>مراجعات أمنية منتظمة</li>
                    <li>تقييد الوصول إلى البيانات الشخصية</li>
                </ul>
            </div>

            <!-- Section 5 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">5. ملفات تعريف الارتباط (Cookies)</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    نستخدم ملفات تعريف الارتباط لتحسين تجربتك وتذكر تفضيلاتك. يمكنك التحكم في ملفات تعريف الارتباط من خلال إعدادات المتصفح.
                </p>
            </div>

            <!-- Section 6 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">6. حقوقك</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-3">
                    لديك الحق في:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li>الوصول إلى بياناتك الشخصية</li>
                    <li>تصحيح البيانات غير الدقيقة</li>
                    <li>حذف حسابك وبياناتك</li>
                    <li>الاعتراض على معالجة بياناتك</li>
                    <li>تنزيل نسخة من بياناتك</li>
                </ul>
            </div>

            <!-- Section 7 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">7. الاحتفاظ بالبيانات</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    نحتفظ ببياناتك طالما كان حسابك نشطاً أو حسب الحاجة لتقديم الخدمات. بعد حذف الحساب، قد نحتفظ ببعض البيانات للأغراض القانونية أو الأمنية.
                </p>
            </div>

            <!-- Section 8 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">8. خصوصية الأطفال</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    خدماتنا غير موجهة للأطفال دون سن 18 عاماً. لا نجمع معلومات من الأطفال عن قصد.
                </p>
            </div>

            <!-- Section 9 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">9. التغييرات على السياسة</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    قد نقوم بتحديث سياسة الخصوصية من وقت لآخر. سنقوم بإشعارك بأي تغييرات جوهرية عبر البريد الإلكتروني أو إشعار على المنصة.
                </p>
            </div>

            <!-- Contact -->
            <div class="bg-gray-50 dark:bg-slate-700/50 rounded-lg p-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-2">تواصل معنا</h3>
                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    إذا كان لديك أي استفسار حول سياسة الخصوصية أو ترغب في ممارسة حقوقك:
                </p>
                <div class="space-y-2 text-gray-700 dark:text-gray-300">
                    <p><strong>البريد الإلكتروني:</strong> privacy@khubrahlink.com</p>
                    <p><strong>الهاتف:</strong> +966 50 123 4567</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
