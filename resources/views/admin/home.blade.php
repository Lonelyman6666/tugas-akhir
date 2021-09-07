@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    <p></p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
      <div class="info">
        <h4>Penghuni</h4>
        <p><b>{{$penghuni}}</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-bed fa-3x"></i>
      <div class="info">
        <h4>Kamar Kosong</h4>
        <p><b>{{$kamar}}</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small warning coloured-icon"><i class="icon fa fa-list fa-3x"></i>
      <div class="info">
        <h4>Keluhan</h4>
        <p><b>{{$keluhan}}</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-list fa-3x"></i>
      <div class="info">
        <h4>Pemesanan</h4>
        <p><b>{{$pemesanan}}</b></p>
      </div>
    </div>
  </div>
</div>
@endsection