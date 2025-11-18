<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
                    جلساتي
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    إدارة جلسات التعليم والتعلم
                </p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ tab: 'upcoming' }">
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
        
        <!-- Tabs -->
        <div class="mb-8">
            <div class="border-b border-gray-200 dark:border-slate-700">
                <nav class="-mb-px flex gap-8">
                    <button @click="tab = 'upcoming'" :class="tab === 'upcoming' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm transition-colors">
                        القادمة ({{ $upcomingSessions->count() }})
                    </button>
                    <button @click="tab = 'completed'" :class="tab === 'completed' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm transition-colors">
                        المكتملة ({{ $completedSessions->count() }})
                    </button>
                </nav>
            </div>
        </div>

        <!-- Upcoming Sessions -->
        <div x-show="tab === 'upcoming'" class="space-y-4">
            @forelse($upcomingSessions as $session)
                @php
                    $otherUser = $session->isTeacher(auth()->id()) ? $session->learner : $session->teacher;
                    $role = $session->isTeacher(auth()->id()) ? 'teacher' : 'learner';
                @endphp
                
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6 hover:shadow-md transition-shadow">
                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
                        <div class="flex items-start gap-4 flex-1">
                            <!-- User Avatar -->
                            <div class="w-16 h-16 bg-gradient-to-br from-primary-600 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                                {{ substr($otherUser->name, 0, 1) }}
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1 flex-wrap">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $otherUser->name }}</h3>
                                    <span class="px-2 py-1 {{ $session->status === 'confirmed' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300' : 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300' }} text-xs rounded-full font-medium">
                                        {{ $session->status_arabic }}
                                    </span>
                                    @if($role === 'teacher')
                                        <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs rounded-full font-medium">
                                            أنت المعلم
                                        </span>
                                    @endif
                                </div>
                                
                                <p class="text-gray-600 dark:text-gray-400 mb-3">{{ $session->skill->title }}</p>
                                
                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        {{ $session->scheduled_at->format('Y-m-d') }}
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $session->scheduled_at->format('h:i A') }} ({{ $session->duration }} دقيقة)
                                    </div>
                                    <div class="flex items-center gap-1">
                                        @if($session->session_type === 'online')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                            </svg>
                                            عن بُعد
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            حضوري
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <a href="{{ route('sessions.show', $session) }}" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-medium transition-colors text-sm">
                                عرض التفاصيل
                            </a>
                            
                            @if($role === 'teacher' && $session->status === 'pending')
                                <form method="POST" action="{{ route('sessions.confirm', $session) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors text-sm">
                                        تأكيد
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    
                    @if($session->notes)
                        <div class="mt-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg p-3">
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                <span class="font-semibold">ملاحظات:</span> {{ $session->notes }}
                            </p>
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-center py-12 bg-white dark:bg-slate-800 rounded-2xl border border-gray-200 dark:border-slate-700">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">لا توجد جلسات قادمة</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">ابدأ بحجز جلسة جديدة</p>
                    <a href="{{ route('skills.index') }}" class="inline-block px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-xl font-semibold transition-colors">
                        استعراض المهارات
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Completed Sessions -->
        <div x-show="tab === 'completed'" class="space-y-4">
            @forelse($completedSessions as $session)
                @php
                    $otherUser = $session->isTeacher(auth()->id()) ? $session->learner : $session->teacher;
                    $role = $session->isTeacher(auth()->id()) ? 'teacher' : 'learner';
                @endphp
                
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start gap-4 flex-1">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                                {{ substr($otherUser->name, 0, 1) }}
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $otherUser->name }}</h3>
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs rounded-full font-medium">
                                        مكتملة
                                    </span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $session->skill->title }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $session->completed_at->format('Y-m-d') }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <a href="{{ route('sessions.show', $session) }}" class="px-4 py-2 bg-gray-100 dark:bg-slate-700 hover:bg-gray-200 dark:hover:bg-slate-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium transition-colors text-sm">
                                عرض التفاصيل
                            </a>
                            
                            @if($role === 'learner' && $session->canBeReviewed())
                                <a href="{{ route('reviews.create', $session) }}" class="px-4 py-2 bg-accent-500 hover:bg-accent-600 text-white rounded-lg font-medium transition-colors text-sm">
                                    تقييم
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-white dark:bg-slate-800 rounded-2xl border border-gray-200 dark:border-slate-700">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">لا توجد جلسات مكتملة</h3>
                    <p class="text-gray-600 dark:text-gray-400">الجلسات المكتملة ستظهر هنا</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>


