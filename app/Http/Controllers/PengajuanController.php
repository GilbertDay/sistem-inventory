<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\JenisBarang;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PengajuanController extends Controller
{
    //

    public function index(){
        $pengajuans = Pengajuan::all();
        $jenis_barangs = JenisBarang::all();
        return view('pages/admin/permohonan', compact('pengajuans','jenis_barangs'));
    }

    public function tambahPengajuan(Request $req){
        $pengajuan = new Pengajuan();
        $pengajuan->user_id = Auth::user()->id;
        $pengajuan->nama_barang = $req->input('nama_barang');
        $pengajuan->jumlah_barang = $req->input('jumlah_barang');
        $pengajuan->alasan = $req->input('alasan');
        $pengajuan->spesifikasi_barang = $req->input('spesifikasi_barang');
        $pengajuan->tgl_pengajuan = Carbon::now();
        $pengajuan->save();
        return redirect()->back();
    }

    public function accept($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->keterangan = 1; // Set to "Diterima"
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan ' . $pengajuan->nama_barang . ' telah diterima.');

    }

    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->keterangan = 2; // Set to "Ditolak"
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan ' . $pengajuan->nama_barang . ' telah ditolak.');
    }
}
