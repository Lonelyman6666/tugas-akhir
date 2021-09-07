<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sewa;
use App\Pembayaran;
use Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    //
    public function index(){
        $id = Session::get('id_penghuni');
        $sewa = Sewa::where('id_penghuni',$id)->first();
        $exp = Carbon::parse($sewa->tenggak_waktu);
        $masa = Carbon::now()->diffInDays($exp,false);
        $tunggakan = Pembayaran::where('id_sewa',$sewa->id)->sum('sisa_pembayaran');

        return view("penghuni.home",compact('masa','tunggakan'));
    }
}
