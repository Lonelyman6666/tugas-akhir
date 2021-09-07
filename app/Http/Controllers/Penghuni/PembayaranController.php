<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sewa;
use App\Pembayaran;
use Session;

class PembayaranController extends Controller
{
    //
    public function index(){
        $id = Session::get('id_penghuni');
        $sewa = Sewa::where('id_penghuni',$id)->first();
        $pembayaran = Pembayaran::where('id_sewa',$sewa->id)->with('sewaRef')->get();
        return view('penghuni.pembayaran.pembayaran',compact('pembayaran'));
    }
    public function ajukan(){
        $id = Session::get('id_penghuni');
        $sewa = Sewa::where('id_penghuni',$id)->first();
        return view('penghuni.pembayaran.ajukanpembayaran',compact('sewa'));
    }
    public function store(Request $request){
        function sisa($a,$b){
            $sisa = $a - $b;
            return $sisa;
        }
        $sewa = Sewa::find($request->id);
        $sisa = sisa($sewa->bayar_sewa,$request->bayar); 

        $pembayaran = new pembayaran();
        $pembayaran->id_sewa = $request->id;
        $pembayaran->bayar_sewa = $request->bayar;
        $pembayaran->sisa_pembayaran = $sisa;
        $pembayaran->tanggal_pembayaran = $request->tanggal;
        $pembayaran->penerima = $request->penerima;
        $pembayaran->status_pembayaran = "Menunggu";
        $pembayaran->save();
        return redirect()->route('pembayaran-penghuni')->with('success','Data Pembayaran Telah Diajukan');
    }
}
