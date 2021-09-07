@extends('admin.layouts.master')
@section('title','Tambah Admin')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i>&nbsp;Admin</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin-admin')}}">Admin</a></li>
      <li class="breadcrumb-item"><a href="#">Tambah Admin</a></li>
    </ul>
</div>
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  @if(session()->get('password'))
    <div class="alert alert-danger">
      {{ session()->get('password') }}  
    </div>
  @endif
  @if(session()->get('gagal'))
    <div class="alert alert-danger">
      {{ session()->get('gagal') }}  
    </div>
  @endif
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Tambah Admin</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('simpanadmin-admin')}}">
                    @csrf
                    <div class="form-group row">
                      <label class="control-label col-md-3">Nama</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">E-mail</label>
                      <div class="col-md-8">
                        <input class="form-control" type="email" name="email" placeholder="Masukkan E-mail" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Password</label>
                      <div class="col-md-8">
                        <input class="form-control" type="password" name="password" placeholder="Masukkan Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Konfirmasi Password</label>
                        <div class="col-md-8">
                          <input class="form-control" type="password" name="konfirmasi" placeholder="Konfirmasi Password" required>
                        </div>
                      </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                          <input class="btn btn-primary" type="submit" value="Tambah">
                        </div>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection