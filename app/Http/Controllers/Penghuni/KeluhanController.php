<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sewa;
use App\Keluhan;
use Session;

class KeluhanController extends Controller
{
    //
    public function index(){
        $id = Session::get('id_penghuni');
        $keluhan = Sewa::where('id_penghuni',$id)->first();
        return view('penghuni.keluhan.tambahkeluhan',compact('keluhan'));
    }
    public function store(Request $request){
        $keluhan = new Keluhan();
        $keluhan->id_sewa = $request->id_sewa;
        $keluhan->keluhan = $request->keluhan;
        $keluhan->status = 'Menunggu';
        $keluhan->save();
        if($keluhan){
            return redirect()->route('keluhan-penghuni')->with('success','Keluhan Berhasil Diajukan');
        }
        else{
            return redirect()->route('keluhan-penghuni')->with('gagal','Keluhan Gagal Diajukan');
        }
    }
    public function riwayat(){
        $id = Session::get('id_penghuni');
        $sewa = Sewa::where('id_penghuni',$id)->first();
        $keluhan = Keluhan::where('id_sewa',$sewa->id)->with('sewaRef')->get();
        return view('penghuni.keluhan.keluhan',compact('keluhan'));
    }
}
