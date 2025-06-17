<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // Otentikasi pengguna

        $request->session()->regenerate(); // Regenerasi sesi

        // LOGIKA REDIRECT BERDASARKAN ROLE_ID
        // Pastikan Anda membandingkan dengan tipe data yang benar (misal int)
        // Periksa apakah pengguna yang diautentikasi adalah admin (role_id 1)
        if (Auth::user()->role_id === 1) {
            // Jika admin, arahkan ke dashboard admin
            return redirect()->route('admin.dashboard');
        } else {
            // Jika bukan admin (misalnya role_id 2 atau lainnya), arahkan ke dashboard pengguna biasa
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}