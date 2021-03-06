@extends('layouts.master')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Sewa</h3>
						</div>
						<div class="panel-body">
							@if (session('success'))
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-info-circle"></i>  {{ session('success') }}
							</div>
							@endif
								<div class="col-lg-12">
								<a href="{{route('sewa.create')}}" class="btn btn-success btn-sm" > Tambah Data </a>
								<br><br>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Penyewa</th>
										<th>Tanggal Sewa</th>
										<th>Fasilitas</th>
										<th>Biaya</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($sewa as $result => $hasil)
									<tr>
										<td>{{$result+1}}</td>
										<td>{{ $hasil->nama}}</td>
										<td>{{ $hasil->tgl_sewa}}</td>
										<td>{{ $hasil->fasilitas}}</td>
										<td>Rp. {{number_format( $hasil->biaya )}}</td>
										<td>
									
											<a href="{{route('sewa.edit', $hasil->id_penyewa)}}" title="Detail Sewa" class="btn btn-warning btn-sm"><i class="fa fa-book"></i>  </a>
												
										</td>

									
									</tr>
									@endforeach
								</tbody>
							</table>
							
							
							</div>
							</div>
							
						</div>
					</div>
@endsection