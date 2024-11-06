<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\JenisBarang;
use Carbon\Carbon;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Supplier;
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

    public function barangMasuk(){
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $barangMasuk = BarangMasuk::all();
        return view('pages/admin/barangMasuk', compact('barangs','suppliers','barangMasuk'));
    }

    public function tambahBarangMasuk(Request $req){
        $barang = new BarangMasuk();
        $barang->barang_id = $req->input('barang_id');
        $barang->supplier_id = $req->input('supplier_id');
        $barang->tanggal = Carbon::parse($req->input('tanggal'));
        $barang->jumlah = $req->input('jumlah');
        $barang->save();
        return redirect()->back()->with('success', 'Sukses menambah data barang masuk');
    }

    public function barangKeluar(){
        $barangs = Barang::all();
        $barangKeluar = BarangKeluar::all();
        return view('pages/admin/barangKeluar', compact('barangs','barangKeluar'));
    }

    public function tambahBarangKeluar(Request $req){
        $barang = new BarangKeluar();
        $barang->barang_id = $req->input('barang');
        $barang->tanggal = Carbon::parse($req->input('tanggal'));
        $barang->jumlah = $req->input('jumlah');
        $barang->save();
        return redirect()->back()->with('success', 'Sukses menambah data barang keluar');
    }

    public function hapusBarangMasuk(Request $req){
        $barang = BarangMasuk::findOrFail($req->input('id'));
        $barang->delete();
        return redirect()->back()->with('success', 'Sukses menghapus data barang masuk');
    }

    public function hapusBarang(Request $req){
        $barang = Barang::findOrFail($req->input('id'));
        $barang->delete();
        return redirect()->back()->with('success', 'Sukses menghapus data barang');
    }


    public function editBarang(Request $req){
        $barang = Barang::findOrFail($req->input('id'));
        $barang->nama_barang = $req->input('nama-barang');
        $barang->stok = $req->input('jumlah_barang');
        $barang->min_stok = $req->input('stok-min');
        $barang->lokasi_barang = $req->input('lokasi_barang');
        $barang->jenis_barang_id = $req->input('jenis_barang');
        $barang->save();
        return redirect()->back()->with('success', 'Sukses mengedit data barang');

    }

    public function editBarangKeluar(Request $req){
        $barang = BarangKeluar::findOrFail($req->input('id'));
        $barang->barang_id = $req->input('barang');
        $barang->tanggal = Carbon::parse($req->input('tanggal'));
        $barang->jumlah = $req->input('jumlah');
        $barang->save();
        return redirect()->back()->with('success', 'Sukses mengedit data barang keluar');

    }

    public function hapusBarangKeluar(Request $req){
        $barang = BarangKeluar::findOrFail($req->input('id'));
        $barang->delete();
        return redirect()->back()->with('success', 'Sukses menghapus data barang keluar');
    }

}
