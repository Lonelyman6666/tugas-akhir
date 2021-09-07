<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penghuni;
use App\DetailPenghuni;
use Hash;

class PenghuniController extends Controller
{
    //
    public function index(){
        $penghuni = Penghuni::all();
        return view('admin.penghuni.penghuni',compact('penghuni'));
    }
    public function create(){
        return view('admin.penghuni.tambahpenghuni');
    }
    public function store(Request $request){
        $password = $request->password;
        $konfirmasi = $request->konfirmasi;
        if($password!=$konfirmasi){
            return redirect()->route('tambahpenghuni-admin')->with('password', 'Password Tidak Sama');
        }else{
            $hash = Hash::make($password);
            $penghuni = new Penghuni();
            $penghuni->username_penghuni =  $request->username;
            $penghuni->password_penghuni = $hash;
            $penghuni->status = 'Non-Aktif';
            $penghuni->save();
            if($penghuni){
                $detailPenghuni = new DetailPenghuni();
                $detailPenghuni->penghuni_id = $penghuni->id;
                $detailPenghuni->save();
                return redirect()->route('tambahpenghuni-admin')->with('success', 'Penghuni Baru Berhasil Ditambahkan');
            }else{
                return redirect()->route('tambahpenghuni-admin')->with('gagal', 'Penghuni Baru Gagal Ditambahkan');
            }
        }
    }
    public function edit($id){
        $penghuni = Penghuni::find($id);
        return view('admin.penghuni.editpenghuni',compact('penghuni'));
    }
    public function update(Request $request,$id){
        $penghuni = Penghuni::find($id);
        $penghuni->username_penghuni = $request->username;
        if($request->password===null){
            $penghuni->password_penghuni = $penghuni->password_penghuni;
        }else{
            $penghuni->password_penghuni = Hash::make($request->password); 
        }
        $penghuni->status = $request->status;
        $penghuni->save();
        if($penghuni){
            return redirect()->route('penghuni-admin')->with('success', 'Data Penghuni Berhasil Diupdate');
        }
        else{
            return redirect()->route('penghuni-admin')->with('gagal', 'Data Penghuni Gagal Diupdate');
        }
    }
    public function detail($id){
        $penghuni = Penghuni::where('id', $id)->with('detailPenghuniRef')->first();
        if($penghuni){
            return view('admin.penghuni.detailpenghuni', compact('penghuni'));
        }
    }
    public function update_detail(Request $request,$id){
        $file = $request->file('file');
        $penghuni = DetailPenghuni::find($id);
        $penghuni->nik_penghuni = $request->nik;
        $penghuni->nama_penghuni = $request->nama;
        $penghuni->alamat_penghuni = $request->alamat;
        $penghuni->wa_penghuni = $request->wa;
        $penghuni->ktp_penghuni = $file->getClientOriginalName();
        $penghuni->save();
        if($penghuni){
            $tujuan_upload = 'foto';
            $file->move($tujuan_upload,$file->getClientOriginalName());
            return redirect()->route('penghuni-admin')->with('success', 'Data Detail Penghuni Berhasil Diupdate');
        }
        else{
            return redirect()->route('penghuni-admin')->with('gagal', 'Data Detail Penghuni Gagal Diupdate');
        }
    }
    public function destroy($id){
        $penghuni = Penghuni::find($id);
        $penghuni->delete();
        if($penghuni){
            return redirect()->route('penghuni-admin')->with('success', 'Data Penghuni Berhasil Dihapus');
        }
        else{
            return redirect()->route('penghuni-admin')->with('gagal', 'Data Penghuni Gagal Dihapus');
        }
    }
}