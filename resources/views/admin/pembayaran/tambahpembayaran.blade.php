@extends('admin.layouts.master')
@section('title','Tambah Pembayaran')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>&nbsp;Pembayaran</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin-admin')}}">Pembayaran</a></li>
      <li class="breadcrumb-item"><a href="#">Tambah Pembayaran</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Tambah Pembayaran</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('simpanpembayaran-admin')}}">
                    @csrf
                    <div class="form-group row">
                      <label class="control-label col-md-3">Nama Penghuni</label>
                      <div class="col-md-8">
                          <select name="id" id="status" class="form-control">
                              @foreach ($sewa as $c)
                              <option value="{{$c->id}}">{{$c->username_penghuni}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Pembayaran</label>
                      <div class="col-md-8">
                        <input class="form-control" type="number" name="bayar" placeholder="Masukkan Jumlah Pembayaran" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Tanggal Pembayaran</label>
                      <div class="col-md-8">
                        <input class="form-control" type="date" name="tanggal" placeholder="Pilih Tanggal Pembayaran" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Penerima</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="penerima" placeholder="Masukkan Penerima Pembayaran" required>
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