@extends('admin.layouts.master')
@section('title','Pemesanan')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i>&nbsp;Pemesanan</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('pemesanan-admin')}}">Pemesanan</a></li>
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
                      <th>Alamat</th>
                      <th>No Wa</th>
                      <th>Fasilitas</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach ( $pemesanan as $p)
                    <tr>
                      <td>{{$no++}}</td>  
                      <td>{{$p->nama}}</td>
                      <td>{{$p->alamat}}</td>
                      <td>{{$p->no_wa}}</td>
                      <td>{{$p->fasilitasRef->jenis}}</td>
                      @php
                      $tgl = Carbon\Carbon::parse($p->created_at);
                      @endphp
                      <td>{{$tgl->isoFormat('D MMMM Y')}}</td>
                      <td>{{$p->status}}</td>
                      <td>
                        @if($p->status == "Menunggu")
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('/admin/pemesanan/'.'diterima/'.$p->id)}}">Terima</a>
                            <a class="dropdown-item" href="{{url('/admin/pemesanan/'.'ditolak/'.$p->id)}}">Tolak</a>
                        </div>
                        </div>
                        @endif
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