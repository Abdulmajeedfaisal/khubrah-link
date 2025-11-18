<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Send contact message
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|in:general,technical,account,payment,suggestion,other',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'الاسم يجب ألا يتجاوز 255 حرف',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'subject.required' => 'الموضوع مطلوب',
            'subject.in' => 'الموضوع غير صحيح',
            'message.required' => 'الرسالة مطلوبة',
            'message.max' => 'الرسالة يجب ألا تتجاوز 2000 حرف',
        ]);

        // TODO: Send email to admin
        // Mail::to('info@khubrahlink.com')->send(new ContactMessage($validated));

        // For now, just log the message
        \Log::info('Contact Form Submission', $validated);

        return back()->with('success', 'تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.');
    }
}
