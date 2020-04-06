@extends('layouts.master')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Kamar</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Biodata</h3>
									
								</div>
								<div class="panel-body">
									<ul class="list-unstyled todo-list">
										<li>
											<p>
												<span class="title">Nama</span>
												<span class="short-description">I Nengah Andre Septiastika</span>
											</p>
										</li>
										<li>
											<p>
												<span class="title">NIM</span>
												<span class="short-description">1815051114</span>
											</p>
										</li>
										<li>
											<p>
												<span class="title">Program Studi</span>
												<span class="short-description">Pendidikan Teknik Informatika</span>
											</p>
										</li>
										
									</ul>
								</div>
							</div>	
								</div>
								
								<div class="col-md-6">
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Studi Kasus</h3>
									
								</div>
								<div class="panel-body">
								<ul class="list-unstyled todo-list">
										<li>
											<p>
												<span class="title">Judul</span>
												<span class="short-description">Pengembangan Sistem Pencatatan Pembayaran Kost Berbasis Web</span>
											</p>
										</li>
										<li>
											<p>
												<span class="title">Penjelasan</span>
												<span class="short-description">Sistem ini merupakan sitem untuk manajemen suatu kost-kostan baik itu pengeloalaan kamar, pembayaran dan sebagainya</span>
											</p>
										</li>
										
										
									</ul>
								</div>
							</div>
							
								</div>
								<div class="col-lg-12">
								<a href="{{route('kamar.create')}}" > Tambah Data </a>

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
											<a href="{{route('kamar.edit', $nilai->id_kamar)}}"> Update </a> |
											<form action="{{route('kamar.destroy', $nilai->id_kamar)}}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit">Delete</button>
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