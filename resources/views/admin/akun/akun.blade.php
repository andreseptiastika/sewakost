@extends('layouts.master')

@section('content')
      
   
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Akun</h3>
						</div>
					
						<div class="panel-body">
							@if (session('success'))
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-info-circle"></i>  {{ session('success') }}
							</div>
							@endif
								<div class="col-lg-12">
								<a href="{{route('akun.create')}}" class="btn btn-success btn-sm" > Tambah Data </a>
								<br><br>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama </th>
										<th>Email</th>
										<th>Tipe User</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($akun as $i=>$nilai) 
									<tr>
										<td>{{$i+1}}</td>
										<td>{{$nilai->name}}</td>
										<td>{{$nilai->email}}</td>
										<td>{{$nilai->roles}}</td>
										<td>
										<form action="{{route('akun.destroy', $nilai->id)}}" method="POST">
												@csrf
												@method('DELETE')
											<a href="{{route('akun.edit', $nilai->id)}}" class="btn btn-primary btn-sm" title="Edit"> <i class="fa fa-pencil"></i> </a>
												<button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
											</form>
										</td>

									
									</tr>
									@endforeach
								</tbody>
							</table>
							{{$akun->links()}}
							
							</div>
							</div>
							
						</div>
					</div>
@endsection