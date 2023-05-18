<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function index()
    {
        return view('wali.index');
    }

    public function absenView()
    {
        return view('wali.absen');
    }
}
