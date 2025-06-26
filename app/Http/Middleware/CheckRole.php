<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  // Parameter role yang diharapkan
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek apakah user sudah login DAN punya role (karena role_id nullable di UsersTableSeeder, atau untuk jaga-jaga)
        if (!Auth::check() || !Auth::user()->role) {
            // Jika tidak login atau tidak punya role, arahkan ke halaman login
            return redirect('login');
        }

        // 2. Ambil nama role dari user yang sedang login
        $userRole = Auth::user()->role->name;

        // 3. Bandingkan role user dengan role yang diizinkan untuk route ini
        if ($userRole == $role) {
            // Jika cocok, lanjutkan request ke halaman tujuan
            return $next($request);
        }

        // 4. Jika tidak cocok, kembalikan error 403 (Forbidden)
        // Ini akan menampilkan halaman "403 | This action is unauthorized."
        abort(403, 'THIS ACTION IS UNAUTHORIZED. You do not have the required role to access this page.');
    }
}