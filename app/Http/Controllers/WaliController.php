<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Absensi;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function index()
    {
        $notifikasi = Notifikasi::all();

        return view('wali.index', [
            'data' => $notifikasi,
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
