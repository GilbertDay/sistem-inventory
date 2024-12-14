<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
    return view('pages/admin/laporanBarangMasuk', [
        'barangMasuk' => [],
    ]);
    }

    public function filter(Request $request)
    {
        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        // Filter berdasarkan tanggal
        $barangMasuk = BarangMasuk::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

        // Kembalikan data ke view
        return view('pages/admin/laporanBarangMasuk', compact('barangMasuk', 'tanggalAwal', 'tanggalAkhir'));
    }


}
