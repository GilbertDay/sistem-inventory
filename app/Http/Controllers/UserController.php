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
        $user->plain_password = $req->input('password');
        $user->type = $req->input('type');
        $user->save();
        return redirect()->back()->with('success', 'Data user berhasil ditambah.');
    }

    public function editUser(Request $req){
        $user = User::find($req->id);
        if($req->input('current_password') == $user->plain_password){
            $user->name = $req->input('name');
            $user->password = bcrypt($req->input('new_password'));
            $user->plain_password = $req->input('new_password');
            $user->save();
            return redirect()->back()->with('success', 'Data user berhasil diupdate.');
        }
        return redirect()->back()->with('error', 'Password saat ini tidak sesuai.');
    }

    public function hapusUser(Request $req){
        $user = User::find($req->id);
        $user->delete();
        return redirect()->back()->with('success', 'Data user berhasil dihapus.');
    }
}

