<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Admin;

class AuthController extends Controller
{
    //
    public function index(){
        return view("admin.login");
    }
    public function login(Request $request){

        $email = $request->email;
        $checkEmail = Admin::where('email_admin', $email)->first();
        if($checkEmail){
            if(Hash::check($request->password, $checkEmail->password_admin)){
                Session::put('id_admin', $checkEmail->id);
                Session::put('is_logged', 1);
                Session::put('user', 'admin');
                Session::put('username', $checkEmail->nama_admin);
            
                return redirect()->route('home-admin');
            }
            return redirect('/admin')->with('gagal','Password Yang Anda Masukan Salah'); //jika password salah
        }
        return redirect('/admin')->with('gagal','Data Admin Tidak Ada'); // email ga ada
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/admin');
    }
}
