@extends('layouts.masterkepala')

@section('content')

<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Laporan Penyewa</h3>
						</div>
						<div class="panel-body">
							
								<div class="col-lg-12">
								<a href="/laporankamar/cetak_pdf" class="btn btn-info btn-sm" target="_blank"> Cetak PDF </a>
								<br><br>
							<table class="table table-bordered">
								<thead>
                                <tr>
										<th>No</th>
										<th>Nama Penyewa</th>
										<th>Jenis Identitas</th>
										<th>Nomer Identitas</th>
										<th>Telepon</th>
										<th>Alamat</th>
									</tr>
								</thead>
								<tbody>
                                @php $i=1 @endphp
									@foreach ($penyewa as $nilai) 
									<tr>
										<td>{{$i++}}</td>
										<td>{{$nilai->nama}}</td>
										<td>{{$nilai->jenis_identitas}}</td>
										<td>{{$nilai->no_identitas}}</td>
										<td>{{$nilai->telp}}</td>
										<td>{{$nilai->alamat}}</td>
									</tr>
									@endforeach
			</tbody>
		</table>
 
	</div>
    @endsection