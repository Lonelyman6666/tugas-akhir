@extends('penghuni.layouts.master')
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
      <li class="breadcrumb-item"><a href="#">Ajukan Pembayaran</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Ajukan Pembayaran</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('simpanpembayaran-penghuni')}}">
                    @csrf
                    <div class="form-group row">
                      <input type="hidden" name="id" value="{{$sewa->id}}">
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Pembayaran</label>
                      <div class="col-md-8">
                        <input class="form-control" type="number" name="bayar" placeholder="Masukkan Jumlah Pembayaran" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Pembayaran Bulan</label>
                      <div class="col-md-8">
                          <select name="bulan" id="status" class="form-control">
                              <option value="Januari">Januari</option>
                              <option value="Februari">Februari</option>
                              <option value="Maret">Maret</option>
                              <option value="April">April</option>
                              <option value="Mei">Mei</option>
                              <option value="Juni">Juni</option>
                              <option value="Juli">Juli</option>
                              <option value="Agustus">Agustus</option>
                              <option value="September">September</option>
                              <option value="Oktober">Oktober</option>
                              <option value="Nopember">Nopember</option>
                              <option value="Desember">Desember</option>
                          </select>
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
                          <input class="btn btn-primary" type="submit" value="Ajukan">
                        </div>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection