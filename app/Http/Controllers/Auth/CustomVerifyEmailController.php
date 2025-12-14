<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomVerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     * هذا Controller مخصص للعمل مع InfinityFree التي تحظر signed URLs
     */
    public function __invoke(Request $request, $id, $hash): RedirectResponse
    {
        // التحقق من أن المستخدم مسجل دخول
        if (!$request->user()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        // التحقق من أن المستخدم يحاول تحقق حسابه الخاص
        if ($request->user()->id != $id) {
            return redirect()->route('verification.notice')
                ->with('error', 'رابط التحقق غير صالح');
        }

        $user = $request->user();

        // التحقق من أن البريد محقق مسبقاً
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard')
                ->with('status', 'email-already-verified');
        }

        // التحقق من صحة الـ hash
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('verification.notice')
                ->with('error', 'رابط التحقق غير صالح');
        }

        // تحقيق البريد
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()->route('verification.notice')
            ->with('verified', true);
    }
}
