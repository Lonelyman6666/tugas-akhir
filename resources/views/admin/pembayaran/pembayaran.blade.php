@extends('admin.layouts.master')
@section('title','Pembayaran')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>&nbsp;Pembayaran</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('pembayaran-admin')}}">Pembayaran</a></li>
    </ul>
</div>
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <a href="{{route('tambahpembayaran-admin')}}"><button type="button" class="btn btn-info">Tambah Pembayaran</button></a>
              <a href="{{route('eksportpembayaran-admin')}}"><button type="button" class="btn btn-info">Laporan Bulan Ini</button></a>
              <br><br> 
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Penghuni</th>
                      <th>Pembayaran Bulan</th>
                      <th>Bayar</th>
                      <th>Sisa</th>
                      <th>Tanggal</th>
                      <th>Penerima</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach ( $pembayaran as $p)
                    <tr>
                      <td>{{$no++}}</td>  
                      <td>{{$p->sewaRef->penghuniRef->username_penghuni}} (No {{$p->sewaRef->kamarRef->no_kamar}} {{$p->sewaRef->kamarRef->cabangRef->nama_cabang}})</td>
                      <td>{{$p->bulan}}</td>
                      <td>{{$p->bayar_sewa}}</td>
                      <td>{{$p->sisa_pembayaran}}</td>
                      <td>{{$p->tanggal_pembayaran}}</td>
                      <td>{{$p->penerima}}</td>
                      <td>{{$p->status_pembayaran}}</td>
                      <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('editpembayaran-admin',$p->id)}}">Edit</a>
                              @if($p->status_pembayaran == "Menunggu" )
                                <a class="dropdown-item" href="{{route('konfirmasipembayaran-admin',$p->id)}}">Konfirmasi</a>
                              @endif
                            </div>
                          </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="{{url('js/plugins/jquery.dataTables.min.js')}}"></script>
      <script type="text/javascript" src="{{url('js/plugins/dataTables.bootstrap.min.js')}}"></script>
      <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection

@push('cs-script')
<script type="text/javascript" src="{{url('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
    
@endpush