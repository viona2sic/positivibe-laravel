<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        return view('pelanggan.dashboard', compact('pelanggan'));
    }
}
