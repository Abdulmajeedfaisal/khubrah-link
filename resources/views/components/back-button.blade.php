@php
    $previousUrl = url()->previous();
    $currentUrl = url()->current();
    $appUrl = config('app.url');
    
    // Check if there's a previous page and it's from the same domain
    $showButton = $previousUrl !== $currentUrl && 
                  (str_contains($previousUrl, $appUrl) || str_contains($previousUrl, 'khubrahlink.test'));
@endphp

@if($showButton)
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-4">
    <button onclick="window.history.back()" 
            class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors group">
        <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        <span class="font-medium">العودة</span>
    </button>
</div>
@endif
