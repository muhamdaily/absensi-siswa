<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::paginate(10);

        return view('absensi.index')->with([
            'data' => Siswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta'); // Set zona waktu default

        $tanggal = $request->input('waktu'); // Mendapatkan tanggal dari inputan
        $waktuSekarang = date('H:i'); // Mendapatkan waktu sekarang (jam dan menit)

        // Menggabungkan tanggal dan waktu
        $waktu = date('Y-m-d H:i', strtotime($tanggal . ' ' . $waktuSekarang));

        $username = $request->input('username');
        $mapel = $request->input('mapel');
        $keterangan = $request->input('keterangan');

        // Simpan data ke dalam tabel absensi
        foreach ($request->input('id_siswa') as $id) {
            Absensi::create([
                'id_siswa' => $id,
                'waktu' => $waktu,
                'username' => $username,
                'mapel' => $mapel,
                'keterangan' => $keterangan,
            ]);
        }

        Session::flash('success', 'Absensi berhasil disimpan.');
        // Redirect atau berikan respon sesuai kebutuhan Anda
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $Absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $Absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $Absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $Absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $Absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $Absensi)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $Absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $Absensi)
    {
        //
    }
}
