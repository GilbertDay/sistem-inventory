<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReparasiBarang;
use App\Models\Barang;
use Carbon\Carbon;
class ReparasiBarangController extends Controller
{
    //

    public function index()
    {
        $reparasiBarangs = ReparasiBarang::with('barang')
        ->orderBy('created_at', 'desc')
        ->get();
        $barangs = Barang::where('status', 'active')->get();
        $grouping = ReparasiBarang::select('barang_id')->groupBy('barang_id')->get();

        // dd($reparasiBarangs);


        return view('pages/admin/reparasiBarang', compact('reparasiBarangs','barangs','grouping'));
    }

    public function tambahReparasiBarang(Request $req)
    {
        $reparasiBarang = new ReparasiBarang();
        $reparasiBarang->barang_id = $req->input('barang');
        $reparasiBarang->keterangan = $req->input('keterangan');
        // $reparasiBarang->jumlah_barang = $req->input('jml_reparasi');
        $reparasiBarang->tanggal_reparasi = $req->input('tanggal_reparasi');
        $reparasiBarang->tanggal_selesai = $req->input('tanggal_selesai');
        $reparasiBarang->status =  $req->input('tanggal_selesai') != null ? 1 : 0;

        $reparasiBarang->save();
        return redirect()->back()->with('success', 'Data Reparasi berhasil ditambah.');
    }

    public function editReparasiBarang(Request $req)
    {
        $reparasiBarang = ReparasiBarang::find($req->input('id'));
        $reparasiBarang->barang_id = $req->input('barang');
        $reparasiBarang->keterangan = $req->input('keterangan');
        $reparasiBarang->tanggal_reparasi = $req->input('tanggal_reparasi');
        $reparasiBarang->tanggal_selesai = $req->input('tanggal_selesai');
        $reparasiBarang->status = 1;
        $reparasiBarang->save();
        return redirect()->back()->with('success', 'Data Reparasi berhasil diupdate.');
    }

    public function hapusReparasiBarang(Request $req)
    {
        $reparasiBarang = ReparasiBarang::find($req->input('id'));
        $reparasiBarang->delete();
        return redirect()->back()->with('success', 'Data Reparasi berhasil dihapus.');
    }
}
