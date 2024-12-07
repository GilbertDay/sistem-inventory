<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokOpname;
use App\Models\Barang;

class StokOpnameController extends Controller
{

    public function index(){
        $barang = Barang::where('status', 'active')->get();
        $stok_opname = StokOpname::all();
        return view ('pages/admin/stokOpname', compact('barang','stok_opname'));
    }

    public function add(Request $req){

        $stok_opname = new StokOpname();
        $stok_opname->barang_id = $req->barang_id;
        $stok_opname->jumlah_fisik = $req->jumlah_fisik;
        $stok_opname->tanggal = $req->tanggal;
        $stok_opname->save();


        return redirect()->back();
    }

    public function change(Request $req){
        $barang = Barang::find($req->barang_id);
        $barang->stok = $req->jumlah_fisik;
        $barang->save();
        return redirect()->back();
    }

    public function edit(Request $req){
        $stok_opname = StokOpname::find($req->id);
        $stok_opname->jumlah_fisik = $req->jumlah_fisik;
        $stok_opname->tanggal = $req->tanggal;
        $stok_opname->save();
        return redirect()->back();
    }

    public function delete(Request $req){
        $stok_opname = StokOpname::find($req->id);
        $stok_opname->delete();
        return redirect()->back();
    }
}
