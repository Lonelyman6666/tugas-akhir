<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pembayaran;
use App\Sewa;
use Carbon;

class PembayaranController extends Controller
{
    //
    public function index(){
        $pembayaran = Pembayaran::with('sewaRef')->get();
        return view('admin.pembayaran.pembayaran',compact('pembayaran'));
    }
    public function create(){
        $sewa = Sewa::Join('tbl_penghuni','tbl_sewa.id_penghuni','=','tbl_penghuni.id')
                    ->select('tbl_sewa.id','tbl_penghuni.username_penghuni')
                    ->get();
        return view('admin.pembayaran.tambahpembayaran',compact('sewa'));
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
        $pembayaran->bulan = $request->bulan;
        $pembayaran->sisa_pembayaran = $sisa;
        $pembayaran->tanggal_pembayaran = $request->tanggal;
        $pembayaran->penerima = $request->penerima;
        if($sisa==0){
            $pembayaran->status_pembayaran = "Lunas";
        }else{
            $pembayaran->status_pembayaran = "Belum Lunas";
        }
        $pembayaran->save();
        if($pembayaran){
            if($sewa->jangka_waktu=='Bulan'){
                $exp = Carbon\Carbon::parse($sewa->tenggak_waktu);
                $tenggak = $exp->addMonths(1);
                $sewa->tenggak_waktu = $tenggak;
                $sewa->save();
            }
            else if($sewa->jangka_waktu=='Tahun'){
                $exp = Carbon\Carbon::parse($sewa->tenggak_waktu);
                $tenggak = $exp->addMonths(12);
                $sewa->tenggak_waktu = $tenggak;
                $sewa->save();
            }

        }

        return redirect()->route('pembayaran-admin')->with('success','Data Pembayaran Telah Ditambahkan');
    }
    public function edit($id){
        $pembayaran = Pembayaran::with('sewaRef')->where('id', $id)->first();
        // $sewa = Sewa::Join('tbl_penghuni','tbl_sewa.id_penghuni','=','tbl_penghuni.id')
        //             ->select('tbl_sewa.id','tbl_penghuni.username_penghuni')
        //             ->get();
        return view('admin.pembayaran.editpembayaran',compact('pembayaran'));
    }
    public function update(Request $request,$id){
        function sisa($a,$b){
            $sisa = $a - $b;
            return $sisa;
        }
        $sewa = Sewa::find($request->id);
        $sisa = sisa($sewa->bayar_sewa,$request->bayar); 
        $pembayaran = Pembayaran::find($id);
        $pembayaran->id_sewa = $request->id;
        $pembayaran->bayar_sewa = $request->bayar;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->sisa_pembayaran = $sisa;
        $pembayaran->tanggal_pembayaran = $request->tanggal;
        $pembayaran->penerima = $request->penerima;
        if($sisa==0){
            $pembayaran->status_pembayaran = "Lunas";
        }else{
            $pembayaran->status_pembayaran = "Belum Lunas";
        }
        $pembayaran->save();
        
        return redirect()->route('pembayaran-admin');
    }
    public function konfirmasi($id){
        $pembayaran = Pembayaran::find($id);
        if($pembayaran->sisa_pembayaran==0){
            $pembayaran->status_pembayaran = "Lunas";
        }else{
            $pembayaran->status_pembayaran = "Belum Lunas";
        }
        $pembayaran->save();
        if($pembayaran){
            $sewa = Sewa::find($pembayaran->id_sewa);
            if($sewa->jangka_waktu=='Bulan'){
                $exp = Carbon\Carbon::parse($sewa->tenggak_waktu);
                $tenggak = $exp->addMonths(1);
                $sewa->tenggak_waktu = $tenggak;
                $sewa->save();
            }
            else if($sewa->jangka_waktu=='Tahun'){
                $exp = Carbon\Carbon::parse($sewa->tenggak_waktu);
                $tenggak = $exp->addMonths(12);
                $sewa->tenggak_waktu = $tenggak;
                $sewa->save();
            }

        }
        return redirect()->route('pembayaran-admin')->with('success','Data Pembayaran Telah Ditambahkan');
    }
    public function destroy($id){
        $pembayaran = pembayaran::find($id);
        $pembayaran->delete();
        return redirect()->route('pembayaran-admin')->with('success', 'pembayaran Terhapus!');
    }
    public function export() 
    {
        return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
    }
}
