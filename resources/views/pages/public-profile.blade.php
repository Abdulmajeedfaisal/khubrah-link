<!DOCTYPE html>
<html lang="ar" dir="rtl" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>أحمد محمد - خبرة لينك</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-cairo antialiased bg-gray-50 dark:bg-slate-900">
    <!-- Navbar -->
    <x-navbar />

    <!-- Profile Header -->
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-5xl shadow-xl">أ</div>
                
                <div class="flex-1 text-center md:text-right">
                    <h1 class="text-4xl font-bold text-white mb-2">أحمد محمد</h1>
                    <p class="text-blue-100 text-lg mb-4">مطور ويب محترف | خبير Laravel</p>

                    <div class="flex items-center justify-center md:justify-start gap-6 mb-4">
                        <div><div class="text-2xl font-bold text-white">4.9</div><div class="text-sm text-blue-100">التقييم</div></div>
                        <div class="w-px h-12 bg-blue-400"></div>
                        <div><div class="text-2xl font-bold text-white">48</div><div class="text-sm text-blue-100">جلسة</div></div>
                        <div class="w-px h-12 bg-blue-400"></div>
                        <div><div class="text-2xl font-bold text-white">12</div><div class="text-sm text-blue-100">مهارة</div></div>
                    </div>

                    <div class="flex items-center justify-center md:justify-start gap-3 mb-6">
                        <button class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold rounded-lg">احجز جلسة</button>
                        <button class="px-6 py-3 bg-white/20 hover:bg-white/30 text-white font-medium rounded-lg">أرسل رسالة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- About -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">نبذة عني</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        مطور ويب محترف مع أكثر من 5 سنوات خبرة. أحب مشاركة المعرفة ومساعدة الآخرين.
                    </p>
                </div>

                <!-- Skills -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">المهارات التي أقدمها</h2>
                    <div class="space-y-4">
                        <div class="border border-gray-200 dark:border-slate-700 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laravel المتقدم</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">بناء تطبيقات احترافية</p>
                            <div class="flex gap-2 mt-3">
                                <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs rounded">التقنية</span>
                                <span class="px-2 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs rounded">متقدم</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">التقييمات (24)</h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">س</div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900 dark:text-white">سارة أحمد</h4>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400">★★★★★</span>
                                    <span class="text-sm text-gray-500">منذ أسبوعين</span>
                                </div>
                                <p class="text-gray-700 dark:text-gray-300 mt-2">معلم ممتاز! شرحه واضح ومبسط</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="space-y-6">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <h3 class="font-bold text-gray-900 dark:text-white mb-4">معلومات الاتصال</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            <span>الرياض، السعودية</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <x-footer />
</body>
</html>
