<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuru = User::where('role', 'Guru')->count();
        $totalWaliMurid = User::where('role', 'Wali Murid')->count();
        $totalPengguna = User::count();

        return view('index', compact('totalGuru', 'totalWaliMurid', 'totalPengguna'));
    }
}
