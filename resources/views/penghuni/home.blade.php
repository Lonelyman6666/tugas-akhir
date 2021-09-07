@extends('penghuni.layouts.master')
@section('title','Dashboard')
@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> DASHBOARD</h1>
    <p></p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
  </ul>
</div>
<div class="row">
  <h4>Masa Sewa Kamar Anda Tinggal {{$masa}} Hari <br>Dan tunggakan Pembayaran Anda Tersisa Rp.{{$tunggakan}}</p>
</div>
@endsection