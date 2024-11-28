<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){
        $dataBarang = Barang::all()->count();
        $dataUser = User::all()->count();
        $barangMasuk = BarangMasuk::all()->count();
        $barangKeluar = BarangKeluar::all()->count();
        $dataSupplier = Supplier::all()->count();
        // dd($minBarang);
        return view('pages/admin/dashboard',compact('dataBarang','dataUser','dataSupplier','barangMasuk','barangKeluar'));
    }
}
