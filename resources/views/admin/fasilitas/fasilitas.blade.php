@extends('admin.layouts.master')
@section('title','Fasilitas')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i>&nbsp;Fasilitas</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('fasilitas-admin')}}">Fasiltas</a></li>
    </ul>
</div>
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  @if(session()->get('gagal'))
    <div class="alert alert-warning">
      {{ session()->get('gagal') }}  
    </div>
  @endif
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <a href="{{route('tambahfasilitas-admin')}}"><button type="button" class="btn btn-info">Tambah Fasilitas</button></a>
              <br><br> 
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach ( $fasilitas as $p)
                    <tr>
                      <td>{{$no++}}</td>  
                      <td>{{$p->jenis}}</td>
                      <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('editfasilitas-admin',$p->id)}}">Edit</a>
                              <a class="dropdown-item" href="{{route('hapusfasilitas-admin',$p->id)}}">Hapus</a>
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