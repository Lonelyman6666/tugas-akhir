<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cabang;

class CabangController extends Controller
{
    //
    public function index(){
        $cabang = Cabang::all();
        return view('admin.cabang.cabang',compact('cabang'));
    }
    public function create(){
        return view('admin.cabang.tambahcabang');
    }
    public function store(Request $request){
        $cabang = new Cabang();
        $cabang->nama_cabang = $request->nama;
        $cabang->alamat = $request->alamat;
        $cabang->save();
        if($cabang){
            return redirect()->route('tambahcabang-admin')->with('success','Data Cabang Baru Berhasil Ditambahkan');
        }
        else{
            return redirect()->route('tambahcabang-admin')->with('gagal','Data Cabang Gagal Ditambahkan');
        }
    }
    public function edit($id){
        $cabang = Cabang::find($id);
        return view('admin.cabang.editcabang',compact('cabang'));
    }
    public function update(Request $request,$id){
        $cabang = Cabang::find($id);
        $cabang->nama_cabang = $request->nama;
        $cabang->alamat = $request->alamat;
        $cabang->save();
        if($cabang){
            return redirect()->route('cabang-admin')->with('success','Data Cabang Berhasil Diupdate');
        }
        else{
            return redirect()->route('cabang-admin')->with('gagal','Data Cabang Gagal Diupdate');
        }
    }
    public function destroy($id){
        $cabang = Cabang::find($id);
        $cabang->delete();
        if($cabang){
            return redirect()->route('cabang-admin')->with('success','Data Cabang Berhasil Dihapus');
        }
        else{
            return redirect()->route('cabang-admin')->with('gagal','Data Cabang Gagal Dihapus');
        }
    }
}
