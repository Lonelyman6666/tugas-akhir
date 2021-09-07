<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sewa;
use App\Penghuni;
use App\Kamar;
use Carbon\Carbon;

class SewaController extends Controller
{
    //
    public function index(){
        $sewa = Sewa::Join('tbl_kamar','tbl_sewa.id_kamar','=','tbl_kamar.id')
                ->Join('tbl_penghuni','tbl_sewa.id_penghuni','=','tbl_penghuni.id')
                ->select('tbl_sewa.*','tbl_kamar.no_kamar','tbl_penghuni.username_penghuni','tbl_sewa.tanggal_masuk')
                ->get();
        return view('admin.sewa.sewa',compact('sewa'    ));
    }
    public function create(){
        $penghuni = Penghuni::where('status','Non-Aktif')->get();
        $kamar = Kamar::where('status_kamar','Kosong')->with('cabangRef')->get();
        return view('admin.sewa.tambahsewa',compact('penghuni','kamar'));
    }
    public function store(Request $request){
        $sewa = new Sewa();
        $sewa->id_kamar = $request->no;
        $sewa->id_penghuni = $request->penghuni;
        $sewa->kost_bareng = $request->bareng;
        $sewa->tanggal_masuk = $request->tanggal;
        $sewa->jangka_waktu = $request->jangka;
        $sewa->bayar_sewa = $request->bayar;
        $sewa->tenggak_waktu = $request->tanggal;
        $sewa->status = 'Aktif';
        $sewa->save();
        if($sewa){
            $kamar = Kamar::find($sewa->id_kamar);
            $kamar->status_kamar = 'Terisi';
            $kamar->save();

            $penghuni = Penghuni::find($sewa->id_penghuni);
            $penghuni->status = 'Aktif';
            $penghuni->save();

            return redirect()->route('sewa-admin')->with('success','Data Sewa Telah Ditambahkan');
        }

        return redirect()->route('sewa-admin');
    }
    public function edit($id){
        $sewa = sewa::where('id', $id)->with('penghuniRef')->with('kamarRef')->first();
        $penghuni = Penghuni::all();
        $kamar = Kamar::Join('tbl_cabang','tbl_kamar.id_cabang','=','tbl_cabang.id')->get();
        return view('admin.sewa.editsewa',compact('sewa','penghuni','kamar'));
    }
    public function update(Request $request,$id){
        $sewa = sewa::find($id);
        $sewa->id_kamar = $request->no;
        $sewa->id_penghuni = $request->penghuni;
        $sewa->kost_bareng = $request->bareng;
        $sewa->tanggal_masuk = $request->tanggal;
        $sewa->jangka_waktu = $request->durasi;
        $sewa->bayar_sewa = $request->bayar_sewa;
        $sewa->status = $request->status;
        $sewa->save();
        if($sewa){
            if($sewa->status == 'Non-Aktif'){
            $kamar = Kamar::find($sewa->id_kamar);
            $kamar->status_kamar = 'Kosong';
            $kamar->save();

            $penghuni = Penghuni::find($sewa->id_penghuni);
            $penghuni->status = 'Non-Aktif';
            $penghuni->save();

            return redirect()->route('sewa-admin')->with('success','Data Sewa Telah diupdate');
            }else{
                $kamar = Kamar::find($sewa->id_kamar);
                $kamar->status_kamar = 'Terisi';
                $kamar->save();

                $penghuni = Penghuni::find($sewa->id_penghuni);
                $penghuni->status = 'Aktif';
                $penghuni->save();
                
                return redirect()->route('sewa-admin')->with('success','Data Sewa Telah Diupdate');
            }
        }
        return redirect()->route('sewa-admin');
    }
    public function destroy($id){
        $sewa = Sewa::find($id);
        $sewa->delete();
        return redirect()->route('sewa-admin')->with('success', 'Sewa Terhapus!');
    }
}
