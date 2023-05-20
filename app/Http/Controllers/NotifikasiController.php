<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = Notifikasi::all();

        return view('wali.notif', [
            'data' => $notifikasi,
        ])->with('navbar', view('layouts.navbar')->with('data', $notifikasi));
    }

    public function postDelete(Request $request)
    {
        $selectedItems = $request->input('selected_items');

        if (!is_array($selectedItems)) {
            // Apabila $selectedItems bukan array, inisialisasi dengan array kosong
            $selectedItems = [];
        }

        if (count($selectedItems) > 0) {
            // Hapus data berdasarkan ID yang diterima
            Notifikasi::whereIn('id', $selectedItems)->delete();
            return redirect()->route('notifikasi.index')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('notifikasi.index')->with('error', 'Tidak ada notifikasi yang dipilih.');
        }
    }
}
