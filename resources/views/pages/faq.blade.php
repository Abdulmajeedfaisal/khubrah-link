<x-app-layout>
    <x-back-to-top />
    <x-back-button />
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">الأسئلة الشائعة</h1>
            <p class="text-xl text-gray-600 dark:text-gray-400">إجابات على الأسئلة الأكثر شيوعاً</p>
        </div>

        <!-- FAQ Accordion -->
        <div class="space-y-4" x-data="{ openFaq: null }">
            <!-- Question 1 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
                <button @click="openFaq = openFaq === 1 ? null : 1" class="w-full px-6 py-4 text-right flex items-center justify-between hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                    <span class="font-bold text-gray-900 dark:text-white">ما هي خبرة لينك؟</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': openFaq === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 1" x-collapse class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        خبرة لينك هي منصة مجتمعية سعودية تربط بين الأشخاص الذين يمتلكون مهارات وخبرات مع من يرغبون في تعلمها. نوفر بيئة آمنة وموثوقة لتبادل المعرفة والمهارات في المجتمع المحلي.
                    </p>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
                <button @click="openFaq = openFaq === 2 ? null : 2" class="w-full px-6 py-4 text-right flex items-center justify-between hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                    <span class="font-bold text-gray-900 dark:text-white">كيف أبدأ في استخدام المنصة؟</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': openFaq === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 2" x-collapse class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        ببساطة، قم بإنشاء حساب مجاني، أضف مهاراتك التي تجيدها، أو ابحث عن المهارات التي ترغب في تعلمها. يمكنك بعدها حجز جلسات مع المدربين أو تقديم خدماتك للآخرين.
                    </p>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
                <button @click="openFaq = openFaq === 3 ? null : 3" class="w-full px-6 py-4 text-right flex items-center justify-between hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                    <span class="font-bold text-gray-900 dark:text-white">هل التسجيل مجاني؟</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': openFaq === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 3" x-collapse class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        نعم، التسجيل في المنصة مجاني بالكامل. لا توجد رسوم اشتراك شهرية. يمكنك تقديم مهارات مجانية أو مدفوعة حسب اختيارك.
                    </p>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
                <button @click="openFaq = openFaq === 4 ? null : 4" class="w-full px-6 py-4 text-right flex items-center justify-between hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                    <span class="font-bold text-gray-900 dark:text-white">كيف يتم الدفع؟</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': openFaq === 4 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 4" x-collapse class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        نوفر بوابات دفع آمنة ومتعددة للجلسات المدفوعة. يتم الدفع عند حجز الجلسة، ويُحتفظ بالمبلغ حتى إتمام الجلسة بنجاح. يمكنك استرداد المبلغ كاملاً عند الإلغاء قبل 24 ساعة من موعد الجلسة. كما يمكنك تقديم أو حجز جلسات مجانية.
                    </p>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
                <button @click="openFaq = openFaq === 5 ? null : 5" class="w-full px-6 py-4 text-right flex items-center justify-between hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                    <span class="font-bold text-gray-900 dark:text-white">هل يمكنني إلغاء الجلسة؟</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': openFaq === 5 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 5" x-collapse class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        نعم، يمكنك إلغاء الجلسة قبل 24 ساعة على الأقل من موعدها واسترداد المبلغ كاملاً. الإلغاء المتأخر قد يؤدي إلى فرض رسوم أو عدم استرداد المبلغ.
                    </p>
                </div>
            </div>

            <!-- Question 6 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
                <button @click="openFaq = openFaq === 6 ? null : 6" class="w-full px-6 py-4 text-right flex items-center justify-between hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                    <span class="font-bold text-gray-900 dark:text-white">كيف أضمن جودة المدربين؟</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': openFaq === 6 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 6" x-collapse class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        نوفر نظام تقييم شامل حيث يمكنك قراءة تقييمات المستخدمين السابقين. كما نراجع البلاغات ونتخذ إجراءات صارمة ضد أي سلوك غير مناسب.
                    </p>
                </div>
            </div>

            <!-- Question 7 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
                <button @click="openFaq = openFaq === 7 ? null : 7" class="w-full px-6 py-4 text-right flex items-center justify-between hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                    <span class="font-bold text-gray-900 dark:text-white">هل الجلسات عن بُعد أم حضورية؟</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': openFaq === 7 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 7" x-collapse class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        يمكنك الاختيار! كل مدرب يحدد نوع الجلسات التي يقدمها (عن بُعد، حضورية، أو كلاهما). يمكنك الفلترة حسب تفضيلاتك عند البحث.
                    </p>
                </div>
            </div>

            <!-- Question 8 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden">
                <button @click="openFaq = openFaq === 8 ? null : 8" class="w-full px-6 py-4 text-right flex items-center justify-between hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                    <span class="font-bold text-gray-900 dark:text-white">كيف أصبح مدرباً على المنصة؟</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': openFaq === 8 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 8" x-collapse class="px-6 pb-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        بعد التسجيل، انتقل إلى "إدارة مهاراتي" وأضف المهارات التي تجيدها مع تحديد السعر والمدة ونوع الجلسة. بمجرد نشر مهارتك، سيتمكن المستخدمون من حجز جلسات معك.
                    </p>
                </div>
            </div>
        </div>

        <!-- Still Have Questions -->
        <div class="mt-12 bg-gradient-to-br from-primary-600 to-primary-800 dark:from-primary-800 dark:to-slate-900 rounded-xl p-8 text-center text-white">
            <h2 class="text-2xl font-bold mb-4">لم تجد إجابة لسؤالك؟</h2>
            <p class="mb-6 text-gray-100">فريق الدعم لدينا جاهز لمساعدتك</p>
            <a href="{{ url('/contact') }}" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition">
                اتصل بنا
            </a>
        </div>
    </div>
</x-app-layout>
