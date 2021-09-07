<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fasilitas;

class FasilitasController extends Controller
{
    //
    public function index(){
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas.fasilitas',compact('fasilitas'));
    }
    public function create(){
        return view('admin.fasilitas.tambahfasilitas');
    }
    public function store(Request $request){
        $fasilitas = new Fasilitas();
        $fasilitas->jenis = $request->jenis;
        $fasilitas->harga_bulan = $request->bulan;
        $fasilitas->harga_tahun = $request->tahun;
        $fasilitas->save();
        if($fasilitas){
            return redirect()->route('tambahfasilitas-admin')->with('success','Data Fasilitas Berhasil Ditambah');
        }
        else{
            return redirect()->route('tambahfasilitas-admin')->with('gagal','Data Fasilitas Gagal Ditambah');
        }
    }
    public function edit($id){
        $fasilitas = Fasilitas::find($id);
        return view('admin.fasilitas.editfasilitas',compact('fasilitas'));
    }
    public function update(Request $request,$id){
        $fasilitas = Fasilitas::find($id);
        $fasilitas->jenis = $request->jenis;
        $fasilitas->harga_bulan = $request->bulan;
        $fasilitas->harga_tahun = $request->tahun;
        $fasilitas->save();
        if($fasilitas){
            return redirect()->route('fasilitas-admin')->with('success','Data Fasilitas Berhasil Diupdate');
        }
        else{
            return redirect()->route('fasilitas-admin')->with('gagal','Data Fasilitas Gagal Diupdate');
        }
    }
    public function destroy($id){
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();
        if($fasilitas){
            return redirect()->route('fasilitas-admin')->with('success','Data Fasilitas Berhasil Dihapus');
        }
        else{
            return redirect()->route('fasilitas-admin')->with('gagal','Data Fasilitas Gagal Dihapus');
        }
    }
}