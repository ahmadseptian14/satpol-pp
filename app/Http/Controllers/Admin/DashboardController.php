<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Performance;

class DashboardController extends Controller
{
    public function index()
    {
        // hitung semua data member di model Member dan tampilkan di view dashboard
        // hitung semua data performance di model Performance dan tampilkan di view dashboard
        return view('pages.admin.dashboard', [
            'member' => Member::count(),
            'performance' => Performance::count(),
        ]);
    }
}
