<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show admin login form.
     */
    public function showLoginForm()
    {
        // If already logged in as admin, redirect to admin dashboard
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Check if user exists and is admin
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'البيانات المدخلة غير صحيحة.',
            ]);
        }

        // Verify password manually
        if (!\Illuminate\Support\Facades\Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'البيانات المدخلة غير صحيحة.',
            ]);
        }

        // Check if user is admin
        if (!$user->is_admin) {
            throw ValidationException::withMessages([
                'email' => 'هذا الحساب غير مصرح له بالوصول إلى لوحة الإدارة.',
            ]);
        }

        // Login the user using admin guard
        Auth::guard('admin')->login($user, $remember);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    /**
     * Handle admin logout request.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * Show admin profile page.
     */
    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    /**
     * Update admin profile information.
     */
    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
        ], [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني مستخدم من قبل',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('admin.profile')
            ->with('success', 'تم تحديث المعلومات بنجاح');
    }

    /**
     * Update admin password.
     */
    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'كلمة المرور الحالية مطلوبة',
            'password.required' => 'كلمة المرور الجديدة مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
        ]);

        // Verify current password
        if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $admin->password)) {
            return redirect()
                ->back()
                ->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
        }

        $admin->update([
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.profile')
            ->with('success', 'تم تحديث كلمة المرور بنجاح');
    }
}
