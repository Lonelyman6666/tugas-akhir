<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kamar;
use App\Cabang;
use App\Fasilitas;

class KamarController extends Controller
{
    //
    public function index(){
        $kamar = Kamar::Join('tbl_fasilitas','tbl_kamar.id_fasilitas','=','tbl_fasilitas.id')
                ->Join('tbl_cabang','tbl_kamar.id_cabang','=','tbl_cabang.id')
                ->select('tbl_kamar.id','tbl_kamar.no_kamar','tbl_fasilitas.jenis','tbl_cabang.nama_cabang','tbl_kamar.status_kamar')
                ->get();
        return view('admin.kamar.kamar',compact('kamar'));
    }
    public function create(){
        $cabang = Cabang::all();
        $fasilitas = Fasilitas::all();
        return view('admin.kamar.tambahkamar',compact('cabang','fasilitas'));
    }
    public function store(Request $request){
        $kamar = new Kamar();
        $kamar->no_kamar = $request->no;
        $kamar->id_fasilitas = $request->fasilitas;
        $kamar->id_cabang = $request->cabang;
        $kamar->status_kamar = $request->status;
        $kamar->save();
        if($kamar){
            return redirect()->route('tambahkamar-admin')->with('success','Data Kamar Berhasil Ditambah');
        }
        else{
            return redirect()->route('tambahkamar-admin')->with('gagal','Data Kamar Gagal Ditambah');
        }
    }
    public function edit($id){
        $kamar = Kamar::where('id', $id)->with('cabangRef')->with('fasilitasRef')->first();
        $cabang = Cabang::all();
        $fasilitas = Fasilitas::all();
        return view('admin.kamar.editkamar',compact('kamar','cabang','fasilitas'));
    }
    public function update(Request $request,$id){
        $kamar = Kamar::find($id);
        $kamar->no_kamar = $request->no;
        $kamar->id_fasilitas = $request->fasilitas;
        $kamar->id_cabang = $request->cabang;
        $kamar->status_kamar = $request->status;
        $kamar->save();
        if($kamar){
            return redirect()->route('kamar-admin')->with('success','Data Kamar Berhasil Diupdate');
        }
        else{
            return redirect()->route('kamar-admin')->with('gagal','Data Kamar Gagal Diupdate');
        }
    }
    public function destroy($id){
        $kamar = Kamar::find($id);
        $kamar->delete();
        if($kamar){
            return redirect()->route('kamar-admin')->with('success','Data Kamar Berhasil Dihapus');
        }
        else{
            return redirect()->route('kamar-admin')->with('gagal','Data Kamar Gagal Dihapus');
        }
    }
}
