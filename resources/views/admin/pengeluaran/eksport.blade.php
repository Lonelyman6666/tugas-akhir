<table class="table table-hover table-bordered" id="sampleTable">
  <thead>
    <tr>
      <th>No</th>
      <th>Keterangan</th>
      <th>Biaya</th>
      <th>Tanggal</th>
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
    </tr>
    @endforeach
  </tbody>
</table>