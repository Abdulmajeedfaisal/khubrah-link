<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Store a newly created report
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reported_user_id' => 'nullable|exists:users,id',
            'reported_content_type' => 'nullable|string',
            'reported_content_id' => 'nullable|integer',
            'reason' => 'required|string|max:255',
            'description' => 'required|string|min:20|max:1000',
            'evidence' => 'nullable|array',
            'evidence.*' => 'nullable|string',
        ], [
            'reason.required' => 'سبب البلاغ مطلوب',
            'reason.max' => 'سبب البلاغ يجب ألا يتجاوز 255 حرف',
            'description.required' => 'وصف البلاغ مطلوب',
            'description.min' => 'وصف البلاغ يجب أن يكون 20 حرف على الأقل',
            'description.max' => 'وصف البلاغ يجب ألا يتجاوز 1000 حرف',
        ]);

        $report = Report::create([
            'reporter_id' => auth()->id(),
            'reported_user_id' => $request->reported_user_id,
            'reported_content_type' => $request->reported_content_type,
            'reported_content_id' => $request->reported_content_id,
            'reason' => $request->reason,
            'description' => $request->description,
            'evidence' => $request->evidence,
            'status' => 'pending',
        ]);

        logActivity('created', $report, 'Submitted report');

        // TODO: Send notification to admin

        return redirect()
            ->back()
            ->with('success', 'تم إرسال البلاغ بنجاح. سيتم مراجعته من قبل الإدارة');
    }
}
