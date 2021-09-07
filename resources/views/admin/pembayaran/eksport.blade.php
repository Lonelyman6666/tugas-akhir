<table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Penghuni</th>
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
        <td>{{$p->bayar_sewa}}</td>
        <td>{{$p->sisa_pembayaran}}</td>
        <td>{{$p->tanggal_pembayaran}}</td>
        <td>{{$p->status_pembayaran}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>