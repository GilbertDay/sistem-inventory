<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Carbon;

class LaporanController extends Controller
{
    public function cetak(Request $request)
{
    // Ambil parameter dari query string
    $tanggalAwal = $request->query('tanggalAwal');
    $tanggalAkhir = $request->query('tanggalAkhir');
    $tipe = $request->query('tipe');


    // Validasi parameter
    if (!$tanggalAwal || !$tanggalAkhir || !$tipe) {
        return redirect()->back()->with('error', 'Parameter tidak lengkap.');
    }

    $title = $tipe == 'barangKeluar' ? 'Laporan Barang Keluar' : 'Laporan Barang Masuk';
    $from = Carbon::parse($tanggalAwal)->locale('id')->isoFormat('D MMMM YYYY');
    $to = Carbon::parse($tanggalAkhir)->locale('id')->isoFormat('D MMMM YYYY');
    // Filter data berdasarkan tipe
    if ($tipe === 'barangKeluar') {
        $barang = BarangKeluar::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
        ->orderBy('created_at', 'ASC')
        ->get();
        $fileName = $from .' - '. $to. ' [Laporan Barang Keluar] ' .'.pdf';
        $pdf = PDF::loadview('pages.laporan', compact('barang','from','to', 'title'));
        // return $pdf->download($fileName);
        return $pdf->stream();
    }
    elseif ($tipe === 'barangMasuk') {
        $barang = BarangMasuk::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();
        $fileName = $from .' - '. $to. ' [Laporan Barang Masuk] ' .'.pdf';
        $pdf = PDF::loadview('pages.laporan', compact('barang','from','to', 'title'));
        // return $pdf->download($fileName);
        return $pdf->stream();
    }
    return redirect()->back()->with('error', 'Tipe laporan tidak valid.');
}

}
