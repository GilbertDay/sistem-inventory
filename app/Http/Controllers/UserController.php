<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('type', 'desc')->get();
        // dd($users);
        return view('pages/admin/users', compact('users'));
    }

    public function dashboard(){
        $dataBarang = Barang::all()->count();
        $dataUser = User::all()->count();
        $barangMasuk = BarangMasuk::all()->count();
        $barangKeluar = BarangKeluar::all()->count();
        $dataSupplier = Supplier::all()->count();
        $minBarang = Barang::whereColumn('stok', '<', 'min_stok')->get();
        return view('pages/staff/dashboard',compact('dataBarang','dataUser','dataSupplier','barangMasuk','barangKeluar', 'minBarang'));
    }

    public function tambahUser(Request $req){
        $user = new User();
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = bcrypt($req->input('password'));
        $user->type = $req->input('type');
        $user->save();
        return redirect()->back();
    }

    public function editUser($id){
        $user = User::find($id);
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = bcrypt($req->input('password'));
        $user->type = $req->input('type');
        $user->save();
        return redirect()->back();
    }

    public function hapusUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}

