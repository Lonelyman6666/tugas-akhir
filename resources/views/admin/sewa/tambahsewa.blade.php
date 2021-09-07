@extends('admin.layouts.master')
@section('title','Tambah Sewa')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>&nbsp;Sewa</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin-admin')}}">Sewa</a></li>
      <li class="breadcrumb-item"><a href="#">Tambah Sewa</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Tambah Sewa</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('simpansewa-admin')}}">
                    @csrf
                    <div class="form-group row">
                      <label class="control-label col-md-3">No Kamar</label>
                      <div class="col-md-8">
                          <select name="no" id="status" class="form-control">
                              @foreach ($kamar as $f)
                              <option value="{{$f->id}}"> No {{$f->no_kamar}} ({{$f->cabangRef->nama_cabang}} - {{$f->fasilitasRef->jenis}})</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Penghuni</label>
                      <div class="col-md-8">
                          <select name="penghuni" id="status" class="form-control">
                              @foreach ($penghuni as $c)
                              <option value="{{$c->id}}">{{$c->username_penghuni}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Kost Bareng</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="bareng" placeholder="Nama Teman Kost Boleh Kosong" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Tanggal Masuk</label>
                      <div class="col-md-8">
                        <input class="form-control" type="date" name="tanggal" placeholder="Pilih Tanggal Masuk" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Jangka Waktu</label>
                      <div class="col-md-8">
                          <select name="jangka" id="status" class="form-control">
                              <option value="Bulan">Bulan</option>
                              <option value="Tahun">Tahun</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Bayar Sewa</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="bayar" placeholder="Bayar" >
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