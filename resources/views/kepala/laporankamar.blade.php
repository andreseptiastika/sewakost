@extends('layouts.masterkepala')

@section('content')

<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Laporan Kamar</h3>
						</div>
						<div class="panel-body">
							
								<div class="col-lg-12">
								<a href="/laporankamar/cetak_pdf" class="btn btn-info btn-sm" target="_blank"> Cetak  </a>
								<br><br>
							<table class="table table-bordered">
								<thead>
				<tr>
                <th>No</th>
				<th>Nama Kamar</th>
				<th>Fasilitas</th>
    			<th>Status</th>
				<th>Harga Sewa</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($kamar as $nilai)
				<tr>
                <td>{{$i++}}</td>
				<td>{{$nilai->nama_kamar}}</td>
				<td>{{$nilai->fasilitas}}</td>
				<td>{{$nilai->status}}</td>		
                <td>Rp. {{number_format($nilai->harga_sewa)}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
 
	</div>
    @endsection