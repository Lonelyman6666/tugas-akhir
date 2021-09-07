@extends('penghuni.layouts.master')
@section('title','Ajukan Keluhan')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-bed"></i>&nbsp;Keluhan</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin-admin')}}">Keluhan</a></li>
      <li class="breadcrumb-item"><a href="#">Ajukan Keluhan</a></li>
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
                <h4>Ajukan Keluhan</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('simpankeluhan-penghuni')}}">
                    @csrf
                    @method('Post')
                    <input type="hidden" name="id_sewa" value="{{$keluhan->id}}">
                    <div class="form-group row">
                      <label class="control-label col-md-3">Keluhan</label>
                      <div class="col-md-8">
                        <textarea class="form-control" type="textarea" name="keluhan" placeholder="Ajukan Keluhan"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                          <input class="btn btn-primary" type="submit" value="Ajukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3"><a href="{{route('riwayatkeluhan-penghuni')}}">Riwayat Keluhan</a></label>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection