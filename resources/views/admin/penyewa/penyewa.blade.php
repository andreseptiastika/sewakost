@extends('layouts.master')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Penyewa</h3>
						</div>
						<div class="panel-body">
							
								<div class="col-lg-12">
								<a href="{{route('penyewa.create')}}" class="btn btn-info btn-sm" > Tambah Data </a>
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
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($penyewa as $i=>$nilai) 
									<tr>
										<td>{{$i+1}}</td>
										<td>{{$nilai->nama}}</td>
										<td>{{$nilai->jenis_identitas}}</td>
										<td>{{$nilai->no_identitas}}</td>
										<td>{{$nilai->telp}}</td>
										<td>{{$nilai->alamat}}</td>
										<td>
										<form action="{{route('penyewa.destroy', $nilai->id_penyewa)}}" method="POST">
												@csrf
												@method('DELETE')
											<a href="{{route('penyewa.edit', $nilai->id_penyewa)}}" class="btn btn-primary btn-sm"> Edit </a>
												<button type="submit" class="btn btn-danger btn-sm">Delete</button>
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