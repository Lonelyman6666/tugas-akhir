@extends('admin.layouts.master')
@section('title','Edit Fasilitas')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i>&nbsp;Fasilitas</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('fasilitas-admin')}}">Fasilitas</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Fasilitas</a></li>
    </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="">
                <h4>Edit Fasilitas</h4><br><br>
                <form class="form-horizontal" method="POST" action="{{route('updatefasilitas-admin',$fasilitas->id)}}">
                    @csrf
                    @method('Patch')
                    <div class="form-group row">
                      <label class="control-label col-md-3">Jenis</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="jenis" value="{{$fasilitas->jenis}}" placeholder="Masukkan Jenis" required>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                          <input class="btn btn-primary" type="submit" value="Update">
                        </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection