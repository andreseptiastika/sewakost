@extends('layouts.master')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Sewa</h3>
						</div>
						<div class="panel-body">
							
								<div class="col-lg-12">
								<a href="{{route('sewa.create')}}" class="btn btn-info btn-sm" > Tambah Data </a>
								<br><br>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Penyewa</th>
										<th>Nama Kamar</th>
										<th>Tanggal Sewa</th>
										<th>Tipe</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($sewa as $result => $hasil)
									<tr>
										<td>{{$result+1}}</td>
										<td>{{ $hasil->kamar->nama_kamar}}</td>
										<td>{{ $hasil->penyewa->nama}}</td>
										<td>{{ $hasil->tgl_sewa}}</td>
										<td>{{ $hasil->tipe}}</td>
										<td>
										<form action="{{route('sewa.destroy', $hasil->id_sewa)}}" method="POST">
												@csrf
												@method('DELETE')
											<a href="{{route('sewa.edit', $hasil->id_sewa)}}" class="btn btn-primary btn-sm"> Edit </a>
												<button type="submit" class="btn btn-danger btn-sm">Delete</button>
											</form>
										</td>

									
									</tr>
									@endforeach
								</tbody>
							</table>
							{{ $sewa->links() }}
							
							</div>
							</div>
							
						</div>
					</div>
@endsection