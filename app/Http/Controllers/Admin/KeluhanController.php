<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Keluhan;

class KeluhanController extends Controller
{
    //
    public function index(){
        $keluhan = Keluhan::with('sewaRef')->get();
        return view('admin.keluhan.keluhan',compact('keluhan'));
    }
    public function updateStatus($type, $id){

        $keluhan = Keluhan::find($id);
        if($type == 'proses'){
            $status = 'Proses';
            $keluhan->status = $status;
            $keluhan->save();

            return redirect()->route('keluhan-admin')->with('success','Keluhan Diproses');
        }
        else if($type == 'selesai'){
            $status = 'Selesai';
            $keluhan->status = $status;
            $keluhan->save();

            return redirect()->route('keluhan-admin')->with('success','Keluhan Selesai');
        }
    }
    public function destroy($id){
        $keluhan = Keluhan::find($id);
        $keluhan->delete();
        if($keluhan){
            return redirect()->route('keluhan-admin')->with('success','Data keluhan Berhasil Dihapus');
        }
        else{
            return redirect()->route('keluhan-admin')->with('gagal','Data keluhan Gagal Dihapus');
        }
    }
}
