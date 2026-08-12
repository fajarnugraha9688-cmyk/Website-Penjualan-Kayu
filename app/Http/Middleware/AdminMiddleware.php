<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Belum login
        if (!Auth::check()) {
            return redirect('/login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // Bukan admin
        if (Auth::user()->role !== 'admin') {
            Auth::logout();

            return redirect('/login')
                ->with('error', 'Anda tidak memiliki hak akses sebagai Admin.');
        }

        // Lolos pengecekan
        return $next($request);
    }
}