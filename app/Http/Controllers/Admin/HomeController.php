<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penghuni;
use App\Kamar;
use App\Keluhan;
use App\Pemesanan;

class HomeController extends Controller
{
    //
    public function index(){
        $penghuni = Penghuni::where('status','Aktif')->count();
        $kamar = Kamar::where('status_kamar','Kosong')->count();
        $keluhan = Keluhan::where('status','Menunggu')->count();
        $pemesanan = Pemesanan::where('status','Menunggu')->count();
        return view("admin.home",compact('penghuni','kamar','keluhan','pemesanan'));
    }
}
