<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna terautentikasi sebagai admin
        if (!Auth::guard('admin')->check()) {
            // Jika tidak terautentikasi, redirect ke halaman login admin
            return redirect()->route('admin.login');
        }

        // Jika terautentikasi, lanjutkan ke request berikutnya
        return $next($request);
    }
}
