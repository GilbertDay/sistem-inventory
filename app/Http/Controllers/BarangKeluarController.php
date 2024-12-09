<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;

class BarangKeluarController extends Controller
{
    public function index()
    {
    return view('pages/admin/laporanBarangKeluar', [
        'barangKeluar' => [],
    ]);
    }

    public function filter(Request $request)
    {
        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        // Filter berdasarkan tanggal
        $barangKeluar = BarangKeluar::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();


        // Kembalikan data ke view
        return view('pages/admin/laporanBarangKeluar', compact('barangKeluar', 'tanggalAwal', 'tanggalAkhir'));
    }

}
