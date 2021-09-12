@extends('admin.layouts.master')
@section('title','Tambah Penghuni')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i>&nbsp;Penghuni</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('penghuni-admin')}}">Penghuni</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Penghuni</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <h4>Edit Penghuni</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updatepenghuni-admin',$penghuni->id)}}">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">Username</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="username" value="{{$penghuni->username_penghuni}}" placeholder="Masukkan Username" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Password</label>
                      <div class="col-md-8">
                        <input class="form-control" type="password" name="password" value="" placeholder="Masukkan Password">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-8">
                            <select name="status" id="status" class="form-control">
                                <option value="Aktif">{{$penghuni->status}}</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non-Aktif">Non-Aktif</option>
                            </select>
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