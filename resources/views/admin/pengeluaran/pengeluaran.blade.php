@extends('admin.layouts.master')
@section('title','Pengeluaran')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>&nbsp;Pengeluaran</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('pengeluaran-admin')}}">Pengeluaran</a></li>
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
              <a href="{{route('tambahpengeluaran-admin')}}"><button type="button" class="btn btn-info">Tambah Pengeluaran</button></a>
              <a href="{{route('eksportpengeluaran-admin')}}"><button type="button" class="btn btn-info">Laporan Bulan Ini</button></a>
              <br><br> 
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Keterangan</th>
                      <th>Biaya</th>
                      <th>Tanggal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach ( $pengeluaran as $p)
                    <tr>
                      <td>{{$no++}}</td>  
                      <td>{{$p->keterangan}}</td>
                      <td>{{$p->biaya}}</td>
                      @php
                      $tanggal = Carbon\Carbon::parse($p->tanggal);  
                      @endphp
                      <td>{{$tanggal->isoFormat('D MMMM Y')}}</td>
                      <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('editpengeluaran-admin',$p->id)}}">Edit</a>
                              <a class="dropdown-item" href="{{route('hapuspengeluaran-admin',$p->id)}}">Hapus</a>
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