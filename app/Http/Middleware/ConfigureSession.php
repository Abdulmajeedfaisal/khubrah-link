<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigureSession
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // تحديد اسم الـ cookie بناءً على المسار (path) بدلاً من الدومين
        // لأن Admin الآن يستخدم /admin prefix بدلاً من subdomain
        $isAdmin = $request->is('admin/*') || $request->is('admin');
        
        $cookieName = $isAdmin ? 'khubrah_link_admin_session' : 'khubrah_link_session';
        
        // تعيين اسم الـ cookie للـ session
        config(['session.cookie' => $cookieName]);
        
        // تعيين الدومين المناسب للـ cookie
        // الآن كلاهما على نفس الدومين، لكن الـ cookie مختلف
        config(['session.domain' => config('app.domain')]);
        
        return $next($request);
    }
}
