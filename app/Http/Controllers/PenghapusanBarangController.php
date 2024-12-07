<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenghapusanBarang;
use App\Models\Barang;
use Carbon\Carbon;

class PenghapusanBarangController extends Controller
{
    public function index()
    {
        $penghapusanBarangs = PenghapusanBarang::all();
        $barangs = Barang::where('status', 'active')->get();
        return view('pages/admin/penghapusanBarang', compact('penghapusanBarangs','barangs'));
    }

    public function add(Request $req) {
        // dd($req);
        $barang = Barang::findOrFail($req->barang_id);
        $barang->status = 'nonactive';
        $barang->save();

        $penghapusanBarang = new PenghapusanBarang();
        $penghapusanBarang->barang_id = $req->barang_id;
        $penghapusanBarang->tanggal_hapus = Carbon::now();
        $penghapusanBarang->keterangan = $req->keterangan;
        $penghapusanBarang->save();

        return redirect()->back();
    }
}
