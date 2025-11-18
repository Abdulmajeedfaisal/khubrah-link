<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('messages.index') }}" class="p-2 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-primary-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                    {{ mb_substr($user->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="font-bold text-xl text-gray-900 dark:text-white">{{ $user->name }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">محادثة</p>
                </div>
            </div>
        </div>
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
                    <p class="text-yellow-700 dark:text-yellow-400 leading-relaxed">
                        نظام المراسلة المباشرة قيد التطوير حالياً وسيكون متاحاً في الإصدار الثاني من المنصة.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700 overflow-hidden opacity-60">
            <div class="flex flex-col h-[600px]">
                
                <!-- Messages Area -->
                <div id="messages-container" class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-50 dark:bg-slate-900">
                    @forelse($messages as $message)
                        @if($message->sender_id === auth()->id())
                            <!-- Sent Message -->
                            <div class="flex items-start gap-2 justify-end">
                                <div class="bg-primary-600 text-white rounded-2xl rounded-tl-none p-3 max-w-md shadow-sm">
                                    <p class="text-sm whitespace-pre-wrap break-words">{{ $message->message }}</p>
                                    <div class="flex items-center justify-end gap-2 mt-1">
                                        <span class="text-xs text-primary-100">{{ $message->created_at->format('h:i A') }}</span>
                                        @if($message->is_read)
                                            <svg class="w-4 h-4 text-primary-100" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Received Message -->
                            <div class="flex items-start gap-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-primary-600 to-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                    {{ mb_substr($message->sender->name, 0, 1) }}
                                </div>
                                <div class="bg-white dark:bg-slate-800 rounded-2xl rounded-tr-none p-3 max-w-md shadow-sm border border-gray-200 dark:border-slate-700">
                                    <p class="text-gray-900 dark:text-white text-sm whitespace-pre-wrap break-words">{{ $message->message }}</p>
                                    <span class="text-xs text-gray-500 mt-1 block">{{ $message->created_at->format('h:i A') }}</span>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="flex items-center justify-center h-full">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">لا توجد رسائل</h3>
                                <p class="text-gray-600 dark:text-gray-400">ابدأ المحادثة بإرسال رسالة</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Message Input -->
                <div class="p-4 border-t border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                    <form id="message-form" method="POST" action="{{ route('messages.store') }}" class="flex items-center gap-2">
                        @csrf
                        <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                        <input 
                            type="text" 
                            name="message" 
                            id="message-input"
                            placeholder="اكتب رسالتك..." 
                            required
                            maxlength="1000"
                            class="flex-1 px-4 py-3 rounded-xl border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                        >
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white p-3 rounded-xl transition-colors flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Auto-scroll to bottom on page load
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('messages-container');
            if (container) {
                container.scrollTop = container.scrollHeight;
            }
        });

        // Handle form submission
        const form = document.getElementById('message-form');
        const input = document.getElementById('message-input');
        
        form.addEventListener('submit', function(e) {
            if (input.value.trim() === '') {
                e.preventDefault();
                return;
            }
        });

        // Auto-scroll after sending message
        form.addEventListener('submit', function() {
            setTimeout(() => {
                const container = document.getElementById('messages-container');
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            }, 100);
        });
    </script>
    @endpush
</x-app-layout>
