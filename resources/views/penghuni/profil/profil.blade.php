@extends('penghuni.layouts.master')
@section('title','Profil')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i>&nbsp;Penghuni</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('profil-penghuni')}}">Profil Penghuni</a></li>
    </ul>
</div>
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  @if(session()->get('gagal'))
    <div class="alert alert-warning">
      {{ session()->get('gagal') }}  
    </div>
  @endif
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Profil</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updateprofil-penghuni',$penghuni->detailPenghuniRef->penghuni_id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">NIK</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="nik" value="{{$penghuni->detailPenghuniRef->nik_penghuni}}" placeholder="Masukkan NIK">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Nama</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="nama" value="{{$penghuni->detailPenghuniRef->nama_penghuni}}" placeholder="Masukkan Nama">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Alamat</label>
                      <div class="col-md-8">
                        <textarea class="form-control" type="textarea" name="alamat" placeholder="Masukkan Alamat">{{$penghuni->detailPenghuniRef->alamat_penghuni}}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">WA</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="wa" value="{{$penghuni->detailPenghuniRef->wa_penghuni}}" placeholder="Masukkan Nama">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Foto KTP</label>
                      <div class="col-md-8">
                        <input class="form-control" type="file" name="file" value="{{$penghuni->detailPenghuniRef->ktp_penghuni}}" placeholder="Masukkan Nama">
                       </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3"></label>
                      <div class="col-md-8">
                        <img src="{{url('foto/'.$penghuni->detailPenghuniRef->ktp_penghuni)}}" width="25%">
                       </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                          <input class="btn btn-primary" type="submit" value="Simpan">
                        </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection