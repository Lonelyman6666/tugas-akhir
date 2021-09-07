@extends('admin.layouts.master')
@section('title','Sewa')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>&nbsp;Sewa</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('sewa-admin')}}">Sewa</a></li>
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
              <a href="{{route('tambahsewa-admin')}}"><button type="button" class="btn btn-info">Tambah Sewa</button></a>
              <br><br> 
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Kamar</th>
                      <th>Nama Penghuni</th>
                      <th>Kost Bareng</th>
                      <th>Tanggal Masuk</th>
                      <th>Durasi</th>
                      <th>Harga</th>
                      <th>Tenggak Waktu</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach ( $sewa as $p)
                    <tr>
                      <td>{{$no++}}</td>  
                      <td>{{$p->no_kamar}} ({{$p->kamarRef->cabangRef->nama_cabang}})</td>
                      <td>{{$p->username_penghuni}}</td>
                      <td>{{$p->kost_bareng}}</td>
                      @php
                          $tgl_masuk = Carbon\Carbon::parse($p->tanggal_masuk);
                          $tenggak = Carbon\Carbon::parse($p->tenggak_waktu);
                      @endphp
                      <td>{{$tgl_masuk->isoFormat('D MMMM Y')}}</td>
                      <td>{{$p->jangka_waktu}}</td>
                      <td>{{$p->bayar_sewa}}</td>
                      <td>{{$tenggak->isoFormat('D MMMM Y')}}</td>
                      <td>{{$p->status}}</td>
                      <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('editsewa-admin',$p->id)}}">Edit</a>
                              <a class="dropdown-item" href="{{route('hapussewa-admin',$p->id)}}">Hapus</a>
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