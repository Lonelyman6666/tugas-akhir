@extends('admin.layouts.master')
@section('title','Keluhan')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i>&nbsp;Keluhan</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('keluhan-admin')}}">Keluhan</a></li>
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
              <br><br> 
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kamar</th>
                      <th>Keluhan</th>
                      <th>tanggal</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach ( $keluhan as $p)
                    <tr>
                      <td>{{$no++}}</td>  
                      <td>{{$p->sewaRef->penghuniRef->username_penghuni}}</td>
                      <td>{{$p->sewaRef->kamarRef->no_kamar}} ({{$p->sewaRef->kamarRef->cabangRef->nama_cabang}})</td>
                      <td>{{$p->keluhan}}</td>
                      @php
                      $tanggal = Carbon\Carbon::parse($p->created_at);  
                      @endphp
                      <td>{{$tanggal->isoFormat('D MMMM Y')}}</td>
                      <td>{{$p->status}}</td>
                      <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('/admin/keluhan/'.'proses/'.$p->id)}}">Proses</a>
                              <a class="dropdown-item" href="{{url('/admin/keluhan/'.'selesai/'.$p->id)}}">Selesai</a>
                              <a class="dropdown-item" href="{{url('/admin/hapuskeluhan/'.$p->id)}}">Hapus</a>
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