<x-guest-layout>
    <!-- Page Title -->
    <div class="text-center mb-8">
        <div class="w-20 h-20 bg-gradient-to-br from-primary-600 to-primary-800 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
            تأكيد البريد الإلكتروني
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
            شكراً لتسجيلك! يرجى تأكيد بريدك الإلكتروني
        </p>
    </div>

    <!-- Error Message -->
    @if (session('error'))
        <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4 mb-6">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-red-600 dark:text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-red-800 dark:text-red-300 font-medium">
                    {{ session('error') }}
                </p>
            </div>
        </div>
    @endif

    <!-- Info Message -->
    @if (!session('verified'))
        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4 mb-6">
            <p class="text-sm text-blue-800 dark:text-blue-300 leading-relaxed">
                قبل البدء، يرجى تأكيد عنوان بريدك الإلكتروني بالنقر على الرابط الذي أرسلناه لك للتو. إذا لم تستلم البريد الإلكتروني، يسعدنا إرسال رابط آخر لك.
            </p>
        </div>
    @endif

    <!-- Email Verified Success Message -->
    @if (session('verified'))
        <div x-data="{ 
                show: true, 
                countdown: 3,
                init() {
                    const interval = setInterval(() => {
                        this.countdown--;
                        if (this.countdown <= 0) {
                            clearInterval(interval);
                            this.show = false;
                            window.location.href = '{{ route('dashboard') }}';
                        }
                    }, 1000);
                }
             }" 
             x-show="show"
             class="bg-green-50 dark:bg-green-900/20 border-2 border-green-300 dark:border-green-700 rounded-xl p-6 mb-6 shadow-lg">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-green-500 dark:bg-green-600 rounded-full flex items-center justify-center animate-pulse">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="text-lg text-green-800 dark:text-green-200 font-bold">
                            تم تأكيد بريدك الإلكتروني بنجاح!
                        </p>
                    </div>
                    <p class="text-sm text-green-700 dark:text-green-300 mb-3">
                        مرحباً بك في منصة خبرة لينك! حسابك الآن مفعّل بالكامل.
                    </p>
                    <div class="flex items-center gap-2 text-sm text-green-600 dark:text-green-400">
                        <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        <span>جاري التوجيه إلى لوحة التحكم خلال <strong x-text="countdown"></strong> ثانية...</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Resend Link Success Message -->
    @if (session('status') == 'verification-link-sent')
        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-4 mb-6">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600 dark:text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-green-800 dark:text-green-300 font-medium">
                    تم إرسال رابط تأكيد جديد إلى عنوان بريدك الإلكتروني!
                </p>
            </div>
        </div>
    @endif

    @if (!session('verified'))
        <div class="space-y-4">
            <!-- Resend Button -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    إعادة إرسال رابط التأكيد
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300 dark:border-slate-600"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white dark:bg-slate-800 text-gray-500 dark:text-gray-400">أو</span>
                </div>
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-gray-100 dark:bg-slate-700 hover:bg-gray-200 dark:hover:bg-slate-600 text-gray-700 dark:text-gray-300 font-semibold py-3 px-4 rounded-xl transition-all duration-300">
                    تسجيل الخروج
                </button>
            </form>
        </div>
    @endif
</x-guest-layout>
