<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of reports
     */
    public function index(Request $request)
    {
        $query = Report::with(['reporter', 'reportedUser', 'resolver']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by reason
        if ($request->filled('reason')) {
            $query->where('reason', 'like', "%{$request->reason}%");
        }

        // Search
        if ($request->filled('search')) {
            $query->whereHas('reporter', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            })->orWhereHas('reportedUser', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            });
        }

        $reports = $query->latest()->paginate(20);

        // Statistics
        $stats = [
            'total' => Report::count(),
            'pending' => Report::pending()->count(),
            'reviewing' => Report::reviewing()->count(),
            'resolved' => Report::resolved()->count(),
            'rejected' => Report::rejected()->count(),
        ];

        return view('admin.reports.index', compact('reports', 'stats'));
    }

    /**
     * Display the specified report
     */
    public function show(Report $report)
    {
        $report->load(['reporter', 'reportedUser', 'resolver']);

        return view('admin.reports.show', compact('report'));
    }

    /**
     * Mark report as reviewing
     */
    public function markAsReviewing(Report $report)
    {
        $report->markAsReviewing();

        logActivity('marked_reviewing', $report, 'Admin marked report as reviewing');

        return redirect()
            ->back()
            ->with('success', 'تم تحديث حالة البلاغ إلى "قيد المراجعة"');
    }

    /**
     * Resolve the report
     */
    public function resolve(Request $request, Report $report)
    {
        $request->validate([
            'admin_notes' => 'required|string|max:1000',
        ], [
            'admin_notes.required' => 'ملاحظات الإدارة مطلوبة',
            'admin_notes.max' => 'ملاحظات الإدارة يجب ألا تتجاوز 1000 حرف',
        ]);

        $report->resolve($request->admin_notes, auth()->id());

        logActivity('resolved', $report, 'Admin resolved report');

        // TODO: Send notification to reporter and reported user

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'تم حل البلاغ بنجاح');
    }

    /**
     * Reject the report
     */
    public function reject(Request $request, Report $report)
    {
        $request->validate([
            'admin_notes' => 'required|string|max:1000',
        ], [
            'admin_notes.required' => 'سبب الرفض مطلوب',
            'admin_notes.max' => 'سبب الرفض يجب ألا يتجاوز 1000 حرف',
        ]);

        $report->reject($request->admin_notes, auth()->id());

        logActivity('rejected', $report, 'Admin rejected report');

        // TODO: Send notification to reporter

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'تم رفض البلاغ');
    }
}
