<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::where('status', 'active')->get();
        return view('pages/admin/supplier', compact('suppliers'));
    }

    public function tambahSupplier(Request $request)
    {
        $supplier = new Supplier();
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->no_telp = $request->no_telp;
        $supplier->save();
        return redirect('/supplier');
    }

    public function editSupplier(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->no_telp = $request->no_telp;
        $supplier->save();
        return redirect('/supplier');
    }

    public function hapusSupplier(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->status = 'nonactive';
        $supplier->save();
        return redirect('/supplier');
    }
}
