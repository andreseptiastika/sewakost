@extends('layouts.masterlaporan')

@section('content')

       <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
          

            <!-- /.box-header -->
            <div class="box-body">
           <div class="col-md-12">
              <center>
                  <h3><b>Kost Orchid</b></h3>
                    <h5>Jalan Raya Antosari-Pupuan Gang Nakula Nomer 11, Pujungan, Pupuan, Tabanan</h5>
                    <h2><u>Laporan Tagihan</u></h2>
                </center>
                <br>
              </div>

               <div class="col-md-12">
		<table class="table table-bordered">
								<thead>
                                <tr>
										<th>No</th>
										<th>Nama Penyewa</th>
										<th>Nama Kamar</th>
										<th>Tanggal Bayar</th>
										<th>Status</th>
										<th>Tagihan</th>
										</tr>
								</thead>
								<tbody>
                                @php $i=1 @endphp
									@foreach ($tagihan as $nilai) 
									<tr>
										<td>{{$i++}}</td>
										<td>{{$nilai->nama}}</td>
										<td>{{$nilai->nama_kamar}}</td>
										<td>{{$nilai->tgl_bayar}}</td>
										<td>{{$nilai->status}}</td>
										<td>Rp. {{number_format($nilai->sub_total)}}</td>
									</tr>
									
									@endforeach
									<tr>
										<td colspan ="5"> <b>Total Tagihan </b> </td>
										<td> <b>Rp. {{number_format($subtotal)}}</b></td>
									</tr>
			</tbody>
		</table>
              </div>
            </div>       

@endsection
 <script type="text/javascript">
      window.print();
     
    </script>