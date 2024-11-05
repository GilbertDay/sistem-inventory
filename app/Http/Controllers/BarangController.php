<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $jenis_barangs = JenisBarang::all();

        return view('pages/admin/dataBarang', compact('barangs', 'jenis_barangs'));
    }

    public function tambahBarang(Request $req)
    {
        $barang = new Barang();
        $barang->nama_barang = $req->input('nama-barang');
        $barang->stok = $req->input('jumlah_barang');
        $barang->user_id = Auth::user()->id;
        $barang->min_stok = $req->input('stok-min');
        $barang->lokasi_barang = $req->input('lokasi_barang');
        $barang->jenis_barang_id = $req->input('jenis_barang');
        $barang->save();
        return redirect()->back();
    }
}
