<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Hash;

class AdminController extends Controller
{
    //
    public function index(){
        $admin = Admin::all();
        return view('admin.admin.admin',compact('admin'));
    }
    public function create(){
        return view('admin.admin.tambahadmin');
    }
    public function store(Request $request){
        $password = $request->password;
        $konfirmasi = $request->konfirmasi;
        if($password!=$konfirmasi){
            return redirect()->route('tambahadmin-admin')->with('password', 'Password Tidak Sama');
        }else{
            $hash = Hash::make($password);
            $admin = new Admin();
            $admin->nama_admin = $request->nama;
            $admin->email_admin = $request->email;
            $admin->password_admin = $hash;
            $admin->save();
            if($admin){
                return redirect()->route('tambahadmin-admin')->with('success', 'Admin Baru Berhasil Ditambahkan');
            }
            else{
                return redirect()->route('tambahadmin-admin')->with('gagal', 'Admin Baru Gagal Ditambahkan');
            }
        }
    }
    public function edit($id){
        $admin = Admin::find($id);
        return view('admin.admin.editadmin',compact('admin'));
    }
    public function update(Request $request,$id){
        $admin = Admin::find($id);
        $admin->nama_admin = $request->nama;
        $admin->email_admin = $request->email;
        if($request->password===null){
            $admin->password_admin = $admin->password_admin;
        }else{
            $admin->password_admin = Hash::make($request->password); 
        }
        $admin->save();
        if($admin){
            return redirect()->route('admin-admin')->with('success', 'Admin Berhasil Diupdate');
        }
        else{
            return redirect()->route('admin-admin')->with('gagal', 'Admin Gagal Diupdate');
        }
    }
    public function destroy($id){
        $admin = Admin::find($id);
        $admin->delete();
        if($admin){
            return redirect()->route('admin-admin')->with('success', 'Admin Berhasil Dihapus');
        }
        else{
            return redirect()->route('admin-admin')->with('gagal', 'Admin Gagal Dihapus');
        }
    }
}
