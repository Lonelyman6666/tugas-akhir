@extends('admin.layouts.master')
@section('title','Tambah Kamar')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-bed"></i>&nbsp;Kamar</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin-admin')}}">Kamar</a></li>
      <li class="breadcrumb-item"><a href="#">Tambah Kamar</a></li>
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
                <h4>Tambah Kamar</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('simpankamar-admin')}}">
                    @csrf
                    <div class="form-group row">
                      <label class="control-label col-md-3">No Kamar</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="no" placeholder="Masukkan No Kamar" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Fasilitas</label>
                      <div class="col-md-8">
                          <select name="fasilitas" id="status" class="form-control">
                              @foreach ($fasilitas as $f)
                              <option value="{{$f->id}}">{{$f->jenis}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Cabang</label>
                      <div class="col-md-8">
                          <select name="cabang" id="status" class="form-control">
                              @foreach ($cabang as $c)
                              <option value="{{$c->id}}">{{$c->nama_cabang}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Status</label>
                      <div class="col-md-8">
                          <select name="status" id="status" class="form-control">
                              <option value="Kosong">Kosong</option>
                              <option value="Terisi">Terisi</option>
                              <option value="Renovasi">Renovasi</option>
                          </select>
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