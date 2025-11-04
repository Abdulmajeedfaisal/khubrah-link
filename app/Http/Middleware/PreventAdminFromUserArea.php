<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventAdminFromUserArea
{
    /**
     * Handle an incoming request.
     *
     * Prevent admin users from accessing user-only areas.
     * Admins should stay in admin panel.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is authenticated and is an admin
        if (auth()->check() && auth()->user()->is_admin) {
            // Redirect to admin dashboard with message
            return redirect()->route('admin.dashboard')
                ->with('info', 'يرجى استخدام لوحة الإدارة. للوصول للموقع كمستخدم، سجل دخول بحساب مستخدم منفصل.');
        }

        return $next($request);
    }
}
