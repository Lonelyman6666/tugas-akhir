@extends('admin.layouts.master')
@section('title','Edit cabang')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i>&nbsp;Cabang</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('cabang-admin')}}">Cabang</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Cabang</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Edit Cabang</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updatecabang-admin',$cabang->id)}}">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">Nama Cabang</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="nama" value="{{$cabang->nama_cabang}}" placeholder="Masukkan Nama Cabang" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Alamat</label>
                      <div class="col-md-8">
                        <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" required>{{$cabang->alamat}}</textarea>
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