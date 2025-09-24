<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locale;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $locali = Locale::all(); // tutti i locali
        return view('admin.dashboard', compact('locali'));
    }
}
