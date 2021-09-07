<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penghuni;
use App\DetailPenghuni;
use Session;

class ProfilController extends Controller
{
    //
    public function index(){
        $id = Session::get('id_penghuni');
        $penghuni = Penghuni::where('id', $id)->with('detailPenghuniRef')->first();;
        return view('penghuni.profil.profil',compact('penghuni'));
    }
    public function update(Request $request,$id){
        $file = $request->file('file');
        $penghuni = DetailPenghuni::find($id);
        $penghuni->nik_penghuni = $request->nik;
        $penghuni->nama_penghuni = $request->nama;
        $penghuni->alamat_penghuni = $request->alamat;
        $penghuni->wa_penghuni = $request->wa;
        if($file != null){
            $penghuni->ktp_penghuni = $file->getClientOriginalName();
            $tujuan_upload = 'foto';
            $file->move($tujuan_upload,$file->getClientOriginalName());
        }
        $penghuni->save();
        if($penghuni){
            return redirect()->route('profil-penghuni')->with('success', 'Data Profil Penghuni Berhasil Diupdate');
        }
        else{
            return redirect()->route('profil-penghuni')->with('gagal', 'Data Profil Penghuni Gagal Diupdate');
        }
    }
}
