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
                            <div class="text-3xl md:text-4xl font-bold text-accent-400">{{ $stats['users'] }}+</div>
                            <div class="text-sm text-gray-200">مستخدم نشط</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-accent-400">{{ $stats['skills'] }}+</div>
                            <div class="text-sm text-gray-200">مهارة متاحة</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-accent-400">{{ $stats['sessions'] }}+</div>
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
                            onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'w-full h-96 bg-gradient-to-br from-primary-400/20 to-accent-400/20 rounded-3xl flex items-center justify-center\'><svg class=\'w-32 h-32 text-white/50\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M13 10V3L4 14h7v7l9-11h-7z\'/></svg></div>';"
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
                @foreach($categories as $index => $category)
                @php
                    $colors = $category->getColorClasses();
                    $gradientClass = "bg-gradient-to-br " . $colors['gradient'];
                @endphp
                <a href="{{ route('skills.index', ['category' => $category->id]) }}" class="group bg-white dark:bg-slate-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 50) }}">
                    <div class="w-16 h-16 mx-auto mb-3 {{ $gradientClass }} rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        @switch($category->icon)
                            @case('code')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                                @break
                            @case('paint-brush')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                </svg>
                                @break
                            @case('language')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                                </svg>
                                @break
                            @case('trophy')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                                @break
                            @case('cake')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                </svg>
                                @break
                            @case('academic')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                @break
                            @default
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                        @endswitch
                    </div>
                    <h3 class="font-bold text-lg group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">{{ $category->name_ar }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $category->skills()->active()->count() }} مهارة</p>
                </a>
                @endforeach
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
                    @auth
                        <a href="{{ route('skills.manage') }}" class="bg-accent-400 hover:bg-accent-500 text-gray-900 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:scale-105">
                            إدارة مهاراتي
                        </a>
                        <a href="{{ route('skills.index') }}" class="bg-white hover:bg-gray-100 text-primary-600 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:scale-105">
                            استعرض المهارات
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-accent-400 hover:bg-accent-500 text-gray-900 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:scale-105">
                            ابدأ الآن مجاناً
                        </a>
                        <a href="{{ route('skills.index') }}" class="bg-white hover:bg-gray-100 text-primary-600 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:scale-105">
                            استعرض المهارات
                        </a>
                    @endauth
                </div>
                @guest
                    <p class="mt-6 text-sm text-gray-200">
                        التسجيل مجاني بالكامل • لا حاجة لبطاقة ائتمان
                    </p>
                @endguest
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
