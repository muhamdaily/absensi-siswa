<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function index()
    {
        $notifikasi = Notifikasi::all();
        $totalGuru = User::where('role', 'Guru')->count();
        $totalWaliMurid = User::where('role', 'Wali Murid')->count();
        $totalPengguna = User::count();

        return view('wali.index', [
            'data' => $notifikasi,
            'totalGuru' => $totalGuru,
            'totalWaliMurid' => $totalWaliMurid,
            'totalPengguna' => $totalPengguna,
        ])->with('navbar', view('layouts.navbar')->with('data', $notifikasi));
    }

    public function absenView()
    {
        $notifikasi = Notifikasi::all();
        $absensi = Absensi::all();

        return view('wali.absen', [
            'data' => $notifikasi,
            'item' => $absensi,
        ])->with('navbar', view('layouts.navbar')
            ->with('data', $notifikasi)
            ->with('item', $absensi));
    }
}
