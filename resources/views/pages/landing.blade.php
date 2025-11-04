<!DOCTYPE html>
<html lang="ar" dir="rtl" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="خبرة لينك - منصة مجتمعية لتبادل المهارات والخبرات بين الأفراد محلياً">
    <title>خبرة لينك - منصة تبادل المهارات</title>

    <!-- Cairo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    
    <!-- Navbar -->
    <x-navbar />

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 dark:from-primary-800 dark:via-primary-900 dark:to-slate-900">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAtMi4yMSAxLjc5LTQgNC00czQgMS43OSA0IDQtMS43OSA0LTQgNC00LTEuNzktNC00em0wIDI0YzAtMi4yMSAxLjc5LTQgNC00czQgMS43OSA0IDQtMS43OSA0LTQgNC00LTEuNzktNC00ek0xMiAxNmMwLTIuMjEgMS43OS00IDQtNHM0IDEuNzkgNCA0LTEuNzkgNC00IDQtNC0xLjc5LTQtNHptMCAyNGMwLTIuMjEgMS43OS00IDQtNHM0IDEuNzkgNCA0LTEuNzkgNC00IDQtNC0xLjc5LTQtNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-10"></div>
        
        <div class="container mx-auto px-4 py-20 lg:py-32 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="text-white space-y-6" data-aos="fade-left">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                        شارك مهاراتك<br>
                        <span class="text-accent-400">تعلم من الآخرين</span>
                    </h1>
                    <p class="text-lg md:text-xl text-gray-100 leading-relaxed">
                        منصة مجتمعية تربط بين مقدمي المهارات والباحثين عنها في نفس المنطقة. علّم ما تجيده، تعلّم ما تحتاجه.
                    </p>
                    
                    <!-- Search Bar -->
                    <form action="{{ route('skills.index') }}" method="GET" class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl p-2 flex flex-col sm:flex-row gap-2">
                        <input type="text" 
                               name="search"
                               placeholder="ابحث عن مهارة... (مثال: برمجة، طبخ، تصوير)" 
                               class="flex-1 px-6 py-4 rounded-xl border-0 focus:ring-2 focus:ring-primary-500 dark:bg-slate-700 dark:text-white text-gray-900">
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                بحث
                            </span>
                        </button>
                    </form>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-accent-400">500+</div>
                            <div class="text-sm text-gray-200">مستخدم نشط</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-accent-400">150+</div>
                            <div class="text-sm text-gray-200">مهارة متاحة</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-accent-400">1000+</div>
                            <div class="text-sm text-gray-200">جلسة مكتملة</div>
                        </div>
                    </div>
                </div>

                <!-- Illustration -->
                <div class="hidden lg:block" data-aos="fade-up" data-aos-duration="600" data-aos-easing="ease-out">
                    <div class="relative hero-container">
                        <!-- Soft Glow Background -->
                        <div class="absolute -inset-6 bg-gradient-to-br from-primary-400/20 to-accent-400/20 rounded-full blur-3xl opacity-70 animate-pulse"></div>
                        
                        <!-- Hero Image -->
                        <img 
                            src="/images/hero.png" 
                            alt="Khubrah-Link - منصة تبادل المهارات المجتمعية"
                            class="relative w-full h-auto hero-image"
                            loading="eager"
                            width="600"
                            height="500"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-auto" viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="currentColor" class="text-gray-50 dark:text-slate-900"/>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50 dark:bg-slate-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">لماذا خبرة لينك؟</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    نوفر لك منصة آمنة وموثوقة لتبادل المهارات والخبرات مع أفراد مجتمعك
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">مجتمع محلي</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        تواصل مع أشخاص في منطقتك وابنِ علاقات حقيقية مع أفراد مجتمعك المحلي
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-accent-100 dark:bg-accent-900 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent-600 dark:text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">موثوق وآمن</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        نظام تقييم ثنائي الاتجاه ومراجعة دقيقة للمستخدمين لضمان تجربة آمنة للجميع
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">مرونة تامة</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        حدد الأوقات التي تناسبك واختر بين الجلسات الحضورية أو عن بُعد
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-white dark:bg-slate-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">كيف تعمل المنصة؟</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    ثلاث خطوات بسيطة للبدء في تبادل المهارات
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Step 1 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full flex items-center justify-center mx-auto shadow-xl">
                            <span class="text-4xl font-bold text-white">1</span>
                        </div>
                        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-primary-200 dark:bg-primary-900 rounded-full -z-10 blur-xl opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold mb-3">أنشئ حسابك</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        سجل مجاناً وأضف المهارات التي تجيدها أو تريد تعلمها
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-accent-400 to-accent-600 rounded-full flex items-center justify-center mx-auto shadow-xl">
                            <span class="text-4xl font-bold text-white">2</span>
                        </div>
                        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-accent-200 dark:bg-accent-900 rounded-full -z-10 blur-xl opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold mb-3">ابحث وتواصل</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        ابحث عن الخبراء في منطقتك وتواصل معهم مباشرة
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center mx-auto shadow-xl">
                            <span class="text-4xl font-bold text-white">3</span>
                        </div>
                        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-green-200 dark:bg-green-900 rounded-full -z-10 blur-xl opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold mb-3">احجز جلستك</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        حدد الوقت المناسب واحجز جلستك الأولى وابدأ التعلم
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-20 bg-gray-50 dark:bg-slate-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">استكشف الفئات</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    مئات المهارات في مختلف المجالات
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Category Cards -->
                <a href="{{ route('skills.index', ['category' => 'التقنية']) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">التقنية</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">برمجة، تصميم، تطوير</p>
                </a>

                <a href="{{ route('skills.index', ['category' => 'الفنون']) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="150">
                    <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">الفنون</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">رسم، موسيقى، حرف</p>
                </a>

                <a href="{{ route('skills.index', ['category' => 'اللغات']) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">اللغات</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">إنجليزي، عربي، فرنسي</p>
                </a>

                <a href="{{ route('skills.index', ['category' => 'الرياضة']) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="250">
                    <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">الرياضة</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">كرة قدم، سباحة، يوغا</p>
                </a>

                <a href="{{ route('skills.index', ['category' => 'الطبخ']) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">الطبخ</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">حلويات، مأكولات، معجنات</p>
                </a>

                <a href="{{ route('skills.index', ['category' => 'أكاديمي']) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="350">
                    <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">أكاديمي</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">رياضيات، علوم، فيزياء</p>
                </a>

                <a href="{{ route('skills.index', ['category' => 'الأعمال']) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">الأعمال</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">تسويق، إدارة، محاسبة</p>
                </a>

                <a href="{{ route('skills.index', ['category' => 'المنزل']) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="450">
                    <div class="w-16 h-16 mx-auto mb-3 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">المنزل</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">صيانة، حدائق، ديكور</p>
                </a>
            </div>

            <div class="text-center mt-12" data-aos="fade-up">
                <a href="{{ route('skills.index') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg">
                    عرض جميع المهارات
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-primary-600 to-primary-800 dark:from-primary-800 dark:to-slate-900 text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-3xl mx-auto" data-aos="zoom-in">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    جاهز للبدء؟
                </h2>
                <p class="text-xl mb-8 text-gray-100">
                    انضم إلى مجتمعنا المتنامي وابدأ في تبادل المهارات اليوم
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-accent-400 hover:bg-accent-500 text-gray-900 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:scale-105">
                        ابدأ الآن مجاناً
                    </a>
                    <a href="{{ route('skills.index') }}" class="bg-white hover:bg-gray-100 text-primary-600 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:scale-105">
                        استعرض المهارات
                    </a>
                </div>
                <p class="mt-6 text-sm text-gray-200">
                    التسجيل مجاني بالكامل • لا حاجة لبطاقة ائتمان
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    <!-- Alpine.js for Dark Mode Toggle -->
    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 600,
            once: true,
            offset: 50,
            easing: 'ease-out'
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>
