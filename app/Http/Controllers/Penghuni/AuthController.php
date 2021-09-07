<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Penghuni;
use Validator;
use Hash;
use Session;

class AuthController extends Controller
{
    //
    public function index(){
        return view("penghuni.login");
    }
    public function login(Request $request){
        $username = $request->username;
        $checkUser = Penghuni::where('username_penghuni', $username)->first();
        if($checkUser){
            if(Hash::check($request->password, $checkUser->password_penghuni)){
                if($checkUser->status == 'Aktif'){
                    Session::put('id_penghuni', $checkUser->id);
                    Session::put('is_logged', 1);
                    Session::put('user', 'penghuni');
                    Session::put('username', $checkUser->username_penghuni);
                        return redirect()->route('home-penghuni');
                }
                return redirect('/penghuni')->with('gagal','Akun Tidak Aktif');
            }
            return redirect('/penghuni')->with('gagal','Password Yang Anda Masukan Salah'); //jika password salah
        }
        return redirect('/penghuni')->with('gagal','Data Penghuni Tidak Ada');; // usename ga ada
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/penghuni');
    }
}
