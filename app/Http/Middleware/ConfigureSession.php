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
        // تحديد اسم الـ cookie بناءً على الدومين
        $isAdmin = $request->getHost() === config('app.admin_domain');
        
        $cookieName = $isAdmin ? 'khubrah_link_admin_session' : 'khubrah_link_session';
        
        // تعيين اسم الـ cookie للـ session
        config(['session.cookie' => $cookieName]);
        
        // تعيين الدومين المناسب للـ cookie
        if ($isAdmin) {
            config(['session.domain' => config('app.admin_domain')]);
        } else {
            config(['session.domain' => config('app.domain')]);
        }
        
        return $next($request);
    }
}
