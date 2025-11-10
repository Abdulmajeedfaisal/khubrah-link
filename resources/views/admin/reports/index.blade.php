<x-admin-layout>
    <x-slot name="header">إدارة البلاغات</x-slot>

    <div class="space-y-6">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">إجمالي البلاغات</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ $stats['total'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gray-100 dark:bg-gray-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">قيد الانتظار</p>
                        <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400 mt-2">{{ $stats['pending'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">قيد المراجعة</p>
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{ $stats['reviewing'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">تم الحل</p>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $stats['resolved'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">مرفوض</p>
                        <p class="text-2xl font-bold text-red-600 dark:text-red-400 mt-2">{{ $stats['rejected'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700 p-6">
            <form method="GET" action="{{ route('admin.reports.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Search -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">البحث</label>
                    <input type="text" 
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="ابحث عن مستخدم..."
                           class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white">
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الحالة</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white" onchange="this.form.submit()">
                        <option value="">جميع الحالات</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                        <option value="reviewing" {{ request('status') == 'reviewing' ? 'selected' : '' }}>قيد المراجعة</option>
                        <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>تم الحل</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>مرفوض</option>
                    </select>
                </div>

                <!-- Reason Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">السبب</label>
                    <input type="text" 
                           name="reason"
                           value="{{ request('reason') }}"
                           placeholder="ابحث عن سبب..."
                           class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white">
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-3 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors">
                        بحث
                    </button>
                </div>
            </form>
        </div>

        <!-- Reports List -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700">
            <div class="p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">قائمة البلاغات ({{ $reports->total() }})</h3>
            </div>
            <div class="divide-y divide-gray-200 dark:divide-slate-700">
                @forelse($reports as $report)
                @php
                    $statusColors = [
                        'pending' => 'border-yellow-500',
                        'reviewing' => 'border-blue-500',
                        'resolved' => 'border-green-500',
                        'rejected' => 'border-red-500',
                    ];
                    $statusBadgeColors = [
                        'pending' => 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400',
                        'reviewing' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400',
                        'resolved' => 'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400',
                        'rejected' => 'bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400',
                    ];
                @endphp
                <div class="p-6 border-r-4 {{ $statusColors[$report->status] ?? 'border-gray-300' }} hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $report->reason }}</h3>
                                <span class="px-3 py-1 {{ $statusBadgeColors[$report->status] ?? 'bg-gray-100' }} text-xs font-semibold rounded-full">
                                    {{ $report->status_arabic }}
                                </span>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-400 mb-3">{{ $report->description }}</p>
                            
                            <div class="flex items-center gap-6 text-sm text-gray-600 dark:text-gray-400 mb-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>المُبلغ: <span class="font-semibold">{{ $report->reporter->name }}</span></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    <span>المُبلغ عنه: <span class="font-semibold">{{ $report->reportedUser->name }}</span></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $report->time_ago }}</span>
                                </div>
                            </div>

                            @if($report->admin_notes)
                            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-3 mb-3">
                                <p class="text-sm font-semibold text-blue-900 dark:text-blue-300 mb-1">ملاحظات الإدارة:</p>
                                <p class="text-sm text-blue-800 dark:text-blue-400">{{ $report->admin_notes }}</p>
                                @if($report->resolver)
                                <p class="text-xs text-blue-600 dark:text-blue-500 mt-1">بواسطة: {{ $report->resolver->name }}</p>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="flex gap-2">
                        <!-- View Details -->
                        <a href="{{ route('admin.reports.show', $report) }}" class="px-4 py-2 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors font-semibold text-sm">
                            عرض التفاصيل
                        </a>

                        @if($report->status == 'pending')
                        <!-- Mark as Reviewing -->
                        <form method="POST" action="{{ route('admin.reports.reviewing', $report) }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-sm transition-colors">
                                بدء المراجعة
                            </button>
                        </form>
                        @endif

                        @if(in_array($report->status, ['pending', 'reviewing']))
                        <!-- Resolve -->
                        <button onclick="openResolveModal({{ $report->id }})" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold text-sm transition-colors">
                            حل البلاغ
                        </button>

                        <!-- Reject -->
                        <button onclick="openRejectModal({{ $report->id }})" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold text-sm transition-colors">
                            رفض البلاغ
                        </button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p class="text-gray-600 dark:text-gray-400 text-lg font-semibold">لا توجد بلاغات</p>
                    <p class="text-gray-500 dark:text-gray-500 text-sm mt-2">لم يتم العثور على أي بلاغات</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($reports->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-700">
                {{ $reports->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Resolve Modal (Placeholder) -->
    <script>
        function openResolveModal(reportId) {
            // TODO: Implement modal
            const notes = prompt('أدخل ملاحظات الحل:');
            if (notes) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/reports/${reportId}/resolve`;
                
                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                
                const notesInput = document.createElement('input');
                notesInput.type = 'hidden';
                notesInput.name = 'admin_notes';
                notesInput.value = notes;
                
                form.appendChild(csrf);
                form.appendChild(notesInput);
                document.body.appendChild(form);
                form.submit();
            }
        }

        function openRejectModal(reportId) {
            // TODO: Implement modal
            const notes = prompt('أدخل سبب الرفض:');
            if (notes) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/reports/${reportId}/reject`;
                
                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                
                const notesInput = document.createElement('input');
                notesInput.type = 'hidden';
                notesInput.name = 'admin_notes';
                notesInput.value = notes;
                
                form.appendChild(csrf);
                form.appendChild(notesInput);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-admin-layout>
