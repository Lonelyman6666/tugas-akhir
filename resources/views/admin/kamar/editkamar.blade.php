@extends('admin.layouts.master')
@section('title','Edit Kamar')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-bed"></i>&nbsp;Kamar</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('kamar-admin')}}">Kamar</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Kamar</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Edit Kamar</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updatekamar-admin',$kamar->id)}}">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">No Kamar</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="no" value="{{$kamar->no_kamar}}" placeholder="Masukkan No Kamar" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Fasilitas</label>
                      <div class="col-md-8">
                          <select name="fasilitas" id="status" class="form-control">
                            <option value="{{$kamar->id_fasilitas}}">{{$kamar->fasilitasRef->jenis}}</option>
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
                            <option value="{{$kamar->id_cabang}}">{{$kamar->cabangRef->nama_cabang}}</option>
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
                            <option value="{{$kamar->status_kamar}}">{{$kamar->status_kamar}}</option>
                            <option value="Kosong">Kosong</option>
                            <option value="Terisi">Terisi</option>
                            <option value="Renovasi">Renovasi</option>
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