<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    //

    public function index(){
        $jenis_barangs = JenisBarang::all();
        return view('pages/admin/jenisBarang', compact('jenis_barangs'));
    }

    public function tambah(Request $req){
        $jenis_barang = new JenisBarang();
        $jenis_barang->nama = $req->nama;
        $jenis_barang->save();

        return redirect()->back();
    }

    public function edit(Request $req){
        $jenis_barang = JenisBarang::find($req->id);
        $jenis_barang->nama = $req->nama;
        $jenis_barang->save();
        return redirect()->back();
    }

    public function hapus(Request $req){
        $jenis_barang = JenisBarang::find($req->id);
        $jenis_barang->delete();
        return redirect()->back();
    }
}
