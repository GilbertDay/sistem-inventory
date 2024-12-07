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
        $reparasiBarangs = ReparasiBarang::all();
        $barangs = Barang::where('status', 'active')->get();

        return view('pages/admin/reparasiBarang', compact('reparasiBarangs','barangs'));
    }

    public function tambahReparasiBarang(Request $req)
    {
        $reparasiBarang = new ReparasiBarang();
        $reparasiBarang->barang_id = $req->input('barang');
        $reparasiBarang->keterangan = $req->input('keterangan');
        // $reparasiBarang->jumlah_barang = $req->input('jml_reparasi');
        $reparasiBarang->tanggal_reparasi = Carbon::now();
        $reparasiBarang->save();
        return redirect()->back();
    }
}
