@extends('layout.master')
@section('title','Lestari Kost')
@section('content')

<div class="jumbotron-container">
  <div class="jumbotron-left">
      <h2 class="jumbotron-header">Temukan keseimbangan yang sempurna<br>
          keramahan, kemewahan dan<br>
          kenyamanan. </h2>
      <p>Kami fokus untuk menyediakan klien dengan level tertinggi<br>
          kenyamanan dan harga terjangkau yang sangat baik </p>
              <a href="" class="btn btn-fill btn-large midle">Pesan</a>
  </div>
</div>

<div class="enjoy-container">
  <div class="enjoy-header">
      <h2 class="enjoy-heading">Tentang Kami</h2>
      <hr class="horizontal">
      <p>Lestari kost berdiri sejak tahun 2000 berlokasi di jalan lohbener indramayu. Lestari kost menyediakan tempat kost untuk mahasiswa dan karyawan. 
          Lestari kost memberikan harga yang bersahabat serta fasilitas yang Baik. 
          Ayo kunjungi lestari kost Karena kami hadir hanya untuk anda semua. </p>
  </div>
</div>

<!-- Enjoy your stay in our hotel -->
<div class="enjoy-container">
  <div class="enjoy-header">
      <h2 class="enjoy-heading">Nikmati masa tinggal Anda di kost kami</h2>
      <hr class="horizontal">
      <p>Kami lebih dari sekedar kost karena kami mempunyai standar kualitas yang baik dengan
          harga yang bersahabat. <br>kost kami terdapat fasilitas :</p>
  </div>
<div class="enjoy-services">
  <div class="first-col">
      <div class="upper">
          <h3>Dapur Umum</h3>
          <p>Anda dapat menggunakan dapur umum yang telah disediakan</p>
      </div>
      <div class="lower">		
          <h3>WC Di Dalam</h3>
          <p>Setiap kamar memiliki WC nya sendiri</p>
      </div>
  </div>
  <div class="sec-col">
          <div class="upper">
              <h3>Perlengkapan Kamar</h3>
              <p>Pada Setiap kamar terdapat Lemari, Kasur, Kipas Angin atau AC</p>
          </div>
          <div class="lower">		
              <h3>Akses Wi-Fi Gratis</h3>
              <p>Anda memiliki akses ke layanan Wi-Fi gratis 24 jam</p>
          </div>
  </div>
</div>
<section class="special-offers">
  <!-- Top Text -->
  <div class="page-header-container">
    <h2 class="page-header">Hubungi Kami</h2>
  </div>
          <div class="mapouter">
              <div class="gmap_canvas">
                  <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Lestari%20Kost,%20Jl.%20Lohbener,%20Lohbener,%20Kec.%20Lohbener,%20Kabupaten%20Indramayu,%20Jawa%20Barat%2045252&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" >
                  </iframe>
                  {{-- <style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style>
                  <style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style> --}}
              </div>
          </div>
</section>
@endsection