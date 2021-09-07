@extends('admin.layouts.master')
@section('title','Edit Pengeluaran')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>&nbsp;Pengeluaran</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('pengeluaran-admin')}}">Pengeluaran</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Pengeluaran</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Edit Pengeluaran</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updatepengeluaran-admin',$pengeluaran->id)}}">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">Keterangan</label>
                      <div class="col-md-8">
                        <input class="form-control" type="tetx" name="keterangan" value="{{$pengeluaran->keterangan}}" placeholder="Keterangan Pengeluaran" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Biaya</label>
                      <div class="col-md-8">
                        <input class="form-control" type="number" name="biaya" value="{{$pengeluaran->biaya}}" placeholder="Biaya Pengeluaran" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Tanggal Pengeluaran</label>
                      <div class="col-md-8">
                        <input class="form-control" type="date" name="tanggal" value="{{$pengeluaran->tanggal}}" placeholder="Pilih Tanggal Pengeluaran" required>
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