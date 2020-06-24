@extends('layouts.master')

@section('content')


<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Kamar</h3>
						</div>

						<div class="panel-body">
							@if (session('success'))
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-info-circle"></i>  {{ session('success') }}
							</div>
							@endif
							
								<div class="col-lg-12">
								<a href="{{route('kamar.create')}}" class="btn btn-success btn-sm" > Tambah Data </a>
								<br><br>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kamar</th>
										<th>Fasilitas</th>
										<th>Status</th>
										<th>Harga Sewa</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($kamar as $i=>$nilai) 
									<tr>
										<td>{{$i+1}}</td>
										<td>{{$nilai->nama_kamar}}</td>
										<td>{{$nilai->fasilitas}}</td>
										<td>{{$nilai->status}}</td>
										<td>{{$nilai->harga_sewa}}</td>
										<td>
										<form action="{{route('kamar.destroy', $nilai->id_kamar)}}" method="POST">
												@csrf
												@method('DELETE')
											<a href="{{route('kamar.edit', $nilai->id_kamar)}}" class="btn btn-primary btn-sm" title="Edit"> <i class="fa fa-pencil"></i>  </a>
												<button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
											</form>
										</td>

									
									</tr>
									@endforeach
								</tbody>
							</table>
							{{$kamar->links()}}
							
							</div>
							</div>
							
						</div>
					</div>
@endsection