<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pemesanan;

class PemesananController extends Controller
{
    //
    public function index(){
        $pemesanan = Pemesanan::with('fasilitasRef')->get();
        return view('admin.pemesanan.pemesanan',compact('pemesanan'));
    }

    public function updateStatus($type, $id){

        $pemesanan = Pemesanan::find($id);
        if($type == 'diterima'){
            $status = 'Diterima';
            $pemesanan->status = $status;
            $pemesanan->save();

            $nomor = $pemesanan->no_wa;
            $pesan = "Kamar yang anda pesan sudah tersedia, silahkan datang ke lokasi \n Lestari Kost";
            $this->sendWa($nomor, $pesan);

            return redirect()->route('pemesanan-admin')->with('success','Pemesanan Diterima');
        }
        else if($type == 'ditolak'){
            $status = 'Ditolak';
            $pemesanan->status = $status;
            $pemesanan->save();

            $nomor = $pemesanan->no_wa;
            $pesan = "Maaf kamar tidak tersedia untuk saat ini \n Lestari Kost";
            $this->sendWa($nomor, $pesan);

            return redirect()->route('pemesanan-admin')->with('success','Pemesanan Ditolak');
        }
    }

    public function sendWa($number, $message){

        $userkey = 'f755728c5026';
        $passkey = '2781a12b1b66632be44ffd12';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $number,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
}
