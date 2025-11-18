<x-app-layout>
    <x-back-to-top />
    <x-back-button />
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">الشروط والأحكام</h1>
            <p class="text-gray-600 dark:text-gray-400">آخر تحديث: {{ date('Y/m/d') }}</p>
        </div>

        <!-- Content -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-8 space-y-8">
            <!-- Introduction -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">مقدمة</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    مرحباً بك في منصة خبرة لينك. باستخدامك لهذه المنصة، فإنك توافق على الالتزام بهذه الشروط والأحكام. يرجى قراءتها بعناية قبل استخدام خدماتنا.
                </p>
            </div>

            <!-- Section 1 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">1. قبول الشروط</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-3">
                    باستخدامك لمنصة خبرة لينك، فإنك توافق على:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li>الالتزام بجميع الشروط والأحكام المذكورة</li>
                    <li>الالتزام بالقوانين المحلية والدولية</li>
                    <li>استخدام المنصة بطريقة مسؤولة وأخلاقية</li>
                    <li>احترام حقوق المستخدمين الآخرين</li>
                </ul>
            </div>

            <!-- Section 2 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">2. التسجيل والحساب</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-3">
                    عند إنشاء حساب على المنصة:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li>يجب أن تكون المعلومات المقدمة صحيحة ودقيقة</li>
                    <li>أنت مسؤول عن الحفاظ على سرية كلمة المرور</li>
                    <li>يجب أن يكون عمرك 18 عاماً على الأقل</li>
                    <li>لا يجوز مشاركة حسابك مع الآخرين</li>
                </ul>
            </div>

            <!-- Section 3 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">3. استخدام المنصة</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-3">
                    يُحظر استخدام المنصة في:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li>نشر محتوى مسيء أو غير قانوني</li>
                    <li>انتحال شخصية الآخرين</li>
                    <li>التحايل أو الاحتيال على المستخدمين</li>
                    <li>إرسال رسائل غير مرغوب فيها (Spam)</li>
                    <li>محاولة اختراق أو تعطيل المنصة</li>
                </ul>
            </div>

            <!-- Section 4 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">4. الجلسات والحجوزات</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li>يجب الالتزام بمواعيد الجلسات المحجوزة</li>
                    <li>يمكن إلغاء الجلسة قبل 24 ساعة على الأقل</li>
                    <li>يجب احترام وقت وجهد الطرف الآخر</li>
                    <li>المنصة مجانية ولا تفرض أي رسوم على الجلسات</li>
                </ul>
            </div>

            <!-- Section 5 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">5. الدفع والاسترداد</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300 mr-4">
                    <li>يمكن للمستخدمين تقديم مهارات مجانية أو مدفوعة</li>
                    <li>جميع المدفوعات تتم عبر بوابات دفع آمنة</li>
                    <li>يمكن استرداد المبلغ كاملاً عند الإلغاء قبل 24 ساعة</li>
                    <li>لا يمكن استرداد المبلغ بعد إتمام الجلسة</li>
                </ul>
            </div>

            <!-- Section 6 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">6. المسؤولية</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    المنصة تعمل كوسيط بين المستخدمين ولا تتحمل مسؤولية جودة الخدمات المقدمة. كل مستخدم مسؤول عن تصرفاته وتعاملاته مع الآخرين.
                </p>
            </div>

            <!-- Section 7 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">7. الملكية الفكرية</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    جميع حقوق الملكية الفكرية للمنصة محفوظة. لا يجوز نسخ أو توزيع أو تعديل أي جزء من المنصة دون إذن كتابي مسبق.
                </p>
            </div>

            <!-- Section 8 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">8. التعديلات</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    نحتفظ بالحق في تعديل هذه الشروط والأحكام في أي وقت. سيتم إشعار المستخدمين بأي تغييرات جوهرية.
                </p>
            </div>

            <!-- Section 9 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">9. إنهاء الحساب</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    نحتفظ بالحق في تعليق أو إنهاء أي حساب ينتهك هذه الشروط والأحكام دون إشعار مسبق.
                </p>
            </div>

            <!-- Contact -->
            <div class="bg-gray-50 dark:bg-slate-700/50 rounded-lg p-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-2">هل لديك أسئلة؟</h3>
                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    إذا كان لديك أي استفسار حول الشروط والأحكام، يرجى التواصل معنا:
                </p>
                <a href="{{ url('/contact') }}" class="text-primary-600 dark:text-primary-400 hover:underline font-medium">
                    اتصل بنا
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
