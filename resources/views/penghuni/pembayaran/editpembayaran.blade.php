@extends('admin.layouts.master')
@section('title','Edit Pembayaran')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>&nbsp;Pembayaran</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('pembayaran-admin')}}">Pembayaran</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Pembayaran</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Edit Pembayaran</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updatepembayaran-admin',$pembayaran->id)}}">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">Nama Penghuni</label>
                      <div class="col-md-8">
                          <select name="id" id="status" class="form-control">
                              <option value="{{$pembayaran->sewaRef->id}}">{{$pembayaran->sewaRef->penghuniRef->username_penghuni}}</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Pembayaran</label>
                      <div class="col-md-8">
                        <input class="form-control" type="number" name="bayar" value="{{$pembayaran->bayar_sewa}}" placeholder="Masukkan Jumlah Pembayaran" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Tanggal Pembayaran</label>
                      <div class="col-md-8">
                        <input class="form-control" type="date" name="tanggal" value="{{$pembayaran->tanggal_pembayaran}}" placeholder="Pilih Tanggal Pembayaran" required>
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