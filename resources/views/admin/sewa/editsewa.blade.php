@extends('admin.layouts.master')
@section('title','Edit Sewa')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>&nbsp;Sewa</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('sewa-admin')}}">Sewa</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Sewa</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Edit Sewa</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updatesewa-admin',$sewa->id)}}">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">No Kamar</label>
                      <div class="col-md-8">
                          <select name="no" id="status" class="form-control">
                            <option value="{{$sewa->id_kamar}}"> No {{$sewa->kamarRef->no_kamar}} ({{$sewa->kamarRef->cabangRef->nama_cabang}})</option>
                              @foreach ($kamar as $f)
                              <option value="{{$f->id}}"> No {{$f->no_kamar}} ({{$f->nama_cabang}})</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Penghuni</label>
                      <div class="col-md-8">
                          <select name="penghuni" id="status" class="form-control">
                            <option value="{{$sewa->id_penghuni}}">{{$sewa->penghuniRef->username_penghuni}}</option>
                              @foreach ($penghuni as $c)
                              <option value="{{$c->id}}">{{$c->username_penghuni}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Kost Bareng</label>
                      <div class="col-md-8">
                        <input class="form-control" type="bareng" name="tanggal" value="{{$sewa->kost_bareng}}" placeholder="Kost Bareng">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Tanggal Masuk</label>
                      <div class="col-md-8">
                        <input class="form-control" type="date" name="tanggal" value="{{$sewa->tanggal_masuk}}" placeholder="Pilih Tanggal Masuk" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Durasi</label>
                      <div class="col-md-8">
                          <select name="durasi" id="status" class="form-control">
                            <option value="{{$sewa->jangka_waktu}}">{{$sewa->jangka_waktu}}</option>
                              <option value="Bulan">Bulan</option>
                              <option value="Tahun">Tahun</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Bayar Sewa</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="bayar_sewa" value="{{$sewa->bayar_sewa}}" placeholder="Pilih Tanggal Masuk" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Durasi</label>
                      <div class="col-md-8">
                          <select name="status" id="status" class="form-control">
                            <option value="{{$sewa->status}}">{{$sewa->status}}</option>
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