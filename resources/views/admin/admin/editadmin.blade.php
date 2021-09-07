@extends('admin.layouts.master')
@section('title','Edit Admin')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i>&nbsp;Admin</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin-admin')}}">Admin</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Admin</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Edit Admin</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updateadmin-admin',$admin->id)}}">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">Nama</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="nama" value="{{$admin->nama_admin}}" placeholder="Masukkan Nama" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">E-mail</label>
                      <div class="col-md-8">
                        <input class="form-control" type="email" name="email" value="{{$admin->email_admin}}" placeholder="Masukkan Email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Password</label>
                      <div class="col-md-8">
                        <input class="form-control" type="password" name="password" value="" placeholder="Masukkan Password">
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                          <input class="btn btn-primary" type="submit" value="Update">
                        </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection