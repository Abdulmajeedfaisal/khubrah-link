<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900 dark:text-white">
            الرسائل
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Version 2 Notice -->
        <div class="mb-6 bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-yellow-900/20 dark:to-orange-900/20 border-2 border-yellow-200 dark:border-yellow-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/40 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-yellow-800 dark:text-yellow-300 mb-2">
                        ⏳ قيد التطوير - الإصدار الثاني
                    </h3>
                    <p class="text-yellow-700 dark:text-yellow-400 leading-relaxed mb-3">
                        نظام المراسلة المباشرة قيد التطوير حالياً وسيكون متاحاً في الإصدار الثاني من المنصة. سيتضمن النظام:
                    </p>
                    <ul class="list-disc list-inside text-yellow-700 dark:text-yellow-400 space-y-1 mr-4">
                        <li>محادثات مباشرة بين المستخدمين</li>
                        <li>إرسال الملفات والصور</li>
                        <li>إشعارات فورية للرسائل الجديدة</li>
                        <li>سجل كامل للمحادثات</li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-yellow-200 dark:border-yellow-800">
                        <p class="text-sm text-yellow-600 dark:text-yellow-500">
                            <strong>حالياً:</strong> يمكنك التواصل مع المستخدمين من خلال تفاصيل الجلسات أو الملفات الشخصية.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden opacity-60">
            <div class="grid grid-cols-1 md:grid-cols-3 h-[600px]">
                
                <!-- Conversations List -->
                <div class="border-l border-gray-200 dark:border-slate-700 overflow-y-auto">
                    <div class="p-4 border-b border-gray-200 dark:border-slate-700">
                        <input type="text" placeholder="بحث في الرسائل..." class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500">
                    </div>
                    
                    <div class="divide-y divide-gray-200 dark:divide-slate-700">
                        @forelse($conversations as $conversation)
                            @php
                                $otherUser = $conversation->getOtherUser(auth()->id());
                                $unreadCount = $conversation->getUnreadCount(auth()->id());
                            @endphp
                            
                            <a href="{{ route('messages.show', $otherUser) }}" class="block p-4 hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors {{ $unreadCount > 0 ? 'bg-primary-50 dark:bg-primary-900/20' : '' }}">
                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-primary-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                        {{ mb_substr($otherUser->name, 0, 1) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <h4 class="font-semibold text-gray-900 dark:text-white truncate">{{ $otherUser->name }}</h4>
                                            <span class="text-xs text-gray-500">{{ $conversation->last_message_at ? $conversation->last_message_at->diffForHumans() : '' }}</span>
                                        </div>
                                        @if($conversation->lastMessage)
                                            <p class="text-sm text-gray-600 dark:text-gray-400 truncate">
                                                {{ $conversation->lastMessage->preview }}
                                            </p>
                                        @endif
                                    </div>
                                    @if($unreadCount > 0)
                                        <span class="w-6 h-6 bg-primary-600 text-white text-xs rounded-full flex items-center justify-center font-bold flex-shrink-0 mt-1">
                                            {{ $unreadCount }}
                                        </span>
                                    @endif
                                </div>
                            </a>
                        @empty
                            <div class="p-8 text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">لا توجد محادثات</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">ابدأ محادثة جديدة مع أحد المستخدمين</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Chat Area - Empty State -->
                <div class="md:col-span-2 flex items-center justify-center bg-gray-50 dark:bg-slate-900">
                    <div class="text-center">
                        <svg class="w-24 h-24 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">اختر محادثة</h3>
                        <p class="text-gray-600 dark:text-gray-400">اختر محادثة من القائمة لبدء المراسلة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
