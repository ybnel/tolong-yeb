<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Film; // Import model Film

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        // Ambil semua film dari database
        $films = Film::all();

        // Kirim data film ke view
        return view('dashboard.dashboard_movies', [
            'films' => $films
        ]);
    }
}