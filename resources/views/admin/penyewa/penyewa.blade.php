@extends('layouts.master')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Penyewa</h3>
						</div>
						<div class="panel-body">
							@if (session('success'))
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-info-circle"></i>  {{ session('success') }}
							</div>
							@endif

							
								<div class="col-lg-12">
								<a href="{{route('penyewa.create')}}" class="btn btn-success btn-sm" > Tambah Data </a>
								<br><br>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Penyewa</th>
										<th>Nomer Identitas</th>
										<th>Telepon</th>
										<th>Alamat</th>
										<th>Kamar </th>
										<th>Aksi </th>
									</tr>
								</thead>
								<tbody>
									@foreach ($penyewa as $i=>$nilai) 
									<tr>
										<td>{{$i+1}}</td>
										<td>{{$nilai->nama}}</td>
										<td>{{$nilai->no_identitas}}</td>
										<td>{{$nilai->telp}}</td>
										<td>{{$nilai->alamat}}</td>
										<td>{{$nilai->kamar->nama_kamar}}</td>
										<td>
										<form action="{{route('penyewa.destroy', $nilai->id_penyewa)}}" method="POST">
												@csrf
												@method('DELETE')
											<a href="{{route('penyewa.edit', $nilai->id_penyewa)}}" class="btn btn-primary btn-sm" title="Edit"> <i class="fa fa-pencil"></i>  </a>
												<button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
											</form>
										</td>

									
									</tr>
									@endforeach
								</tbody>
							</table>
							{{$penyewa->links()}}
							
							</div>
							</div>
							
						</div>
					</div>
@endsection