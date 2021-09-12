@extends('penghuni.layouts.master')
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
              <a href="{{route('ajukanpembayaran-penghuni')}}"><button type="button" class="btn btn-info">Ajukan Pembayaran</button></a>
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
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach ( $pembayaran as $p)
                    <tr>
                      <td>{{$no++}}</td>  
                      <td>{{$p->sewaRef->penghuniRef->username_penghuni}}</td>
                      <th>{{$p->bulan}}</th>
                      <td>{{$p->bayar_sewa}}</td>
                      <td>{{$p->sisa_pembayaran}}</td>
                      <td>{{$p->tanggal_pembayaran}}</td>
                      <td>{{$p->status_pembayaran}}</td>
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