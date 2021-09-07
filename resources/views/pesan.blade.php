@extends('layout.master')
@section('title','Pesan Kost')
@section('content')

<div class="container">
    <!-- Header part contain Title page and descriptoion -->
    <div class="header">
        <h2>Pesan</h2>
        <hr/>
        <p>
            Tertarik untuk menempati kost kami silahkan isi formulir untuk memesan 
        </p>
    </div>

    <!-- End of header Part -->

    <!-- Main part contain form and informatoion contactus -->
    <div class="main">
        <div class="contact">
            <!-- Form start here -->
            <div class="contact-form">
                <div class="col-sm-12">
                    @if(session()->get('success'))
                      <div class="alert">
                        {{ session()->get('success') }}  
                      </div>
                    @endif
                    @if(session()->get('gagal'))
                      <div class="alert alert-warning">
                        {{ session()->get('gagal') }}  
                      </div>
                    @endif
                  </div>
                <form action="{{route('simpanpesan')}}" method="POST">
                    @csrf
                    <div class="contact-detail">
                        <input type="text" class="form-control" placeholder="Nama" id="name" name="nama"/>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="No WA"
                            id="email"
                            name="wa"
                        />
                    </div>
                    <select name="fasilitas" class="form-control" style="resize: none; width: 100%;">
                        <option value="">Silahkan Pilih Fasilitas Yang Anda Inginkan</option>
                        @foreach ($fasilitas as $f)
                        <option value="{{$f->id}}">{{$f->jenis}}</option>
                        @endforeach
                    </select>
                    <textarea
                        class="form-control"
                        placeholder="Alamat Asal"
                        style="resize: none; width: 100%; height:25%;"
                        name="alamat"
                    ></textarea>

                    <input type="submit" class="btn" value="Pesan" style="width:100%">
                </form>
            </div>
            <!-- Form finish here -->
        </div>
    </div>
</div>

@endsection