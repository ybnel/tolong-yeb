<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class Admin extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        // Pastikan baris ini menunjuk ke file layout admin Anda
        return view('layouts.admin');
    }
}
