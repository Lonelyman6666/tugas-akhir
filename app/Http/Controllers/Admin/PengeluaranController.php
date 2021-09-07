<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PengeluaranExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengeluaran;

class PengeluaranController extends Controller
{
    //
    public function index(){
        $pengeluaran = Pengeluaran::all();
        return view('admin.pengeluaran.pengeluaran',compact('pengeluaran'));
    }
    public function create(){
        return view('admin.pengeluaran.tambahpengeluaran');
    }
    public function store(Request $request){
        $pengeluaran = new Pengeluaran();
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->biaya = $request->biaya;
        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->save();
        if($pengeluaran){
            return redirect()->route('tambahpengeluaran-admin')->with('success','Data Pengeluaran Berhasil Disimpan');
        }
        else{
            return redirect()->route('tambahpengeluaran-admin')->with('success','Data Pengeluaran Gagal Disimpan');
        }
    }
    public function edit($id){
        $pengeluaran = pengeluaran::find($id);

        return view('admin.pengeluaran.editpengeluaran',compact('pengeluaran'));
    }
    public function update(Request $request,$id){ 
        $pengeluaran = pengeluaran::find($id);
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->biaya = $request->biaya;
        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->save();
        if($pengeluaran){
            return redirect()->route('pengeluaran-admin')->with('success','Data Pengeluaran Berhasil Disimpan');
        }
        else{
            return redirect()->route('pengeluaran-admin')->with('success','Data Pengeluaran Gagal Disimpan');
        }
        
    }
    public function destroy($id){
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect()->route('pengeluaran-admin')->with('success', 'pengeluaran Terhapus!');
    }
    public function export() 
    {
        return Excel::download(new PengeluaranExport, 'pengeluaran.xlsx');
    }
}
