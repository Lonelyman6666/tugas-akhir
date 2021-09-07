<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Fasilitas;

class HomeController extends Controller
{
    //
    public function index(){
        return view("home");
    }
    public function pesan(){
        $fasilitas = Fasilitas::all();
        return view("pesan",compact('fasilitas'));
    }
    public function store(Request $request){
        $Pemesanan = new Pemesanan();
        $Pemesanan->nama = $request->nama;
        $Pemesanan->alamat = $request->alamat;
        $Pemesanan->no_wa = $request->wa;
        $Pemesanan->id_fasilitas = $request->fasilitas;
        $Pemesanan->status = 'Menunggu';

        $Pemesanan->save();
        if($Pemesanan){
            return redirect()->route('pesan')->with('success','Pemesanan Telah Terkirim Silahkan Tunggu konfirmasi melalui WA');
        }
        else{
            return redirect()->route('pesan')->with('gagal','Data Pemesanan Gagal Ditambah');
        }
    }
}
