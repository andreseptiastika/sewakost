@extends('layouts.masterkepala')

@section('content')

<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Laporan Tagihan</h3>
						</div>
						<div class="panel-body">

							
								<div class="col-lg-12">
								<a href="/laporantagihan/cetak_tagihan" class="btn btn-info btn-sm" target="_blank"> Cetak  </a>
								<br><br>
								
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
    @endsection