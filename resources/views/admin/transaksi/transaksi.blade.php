@extends('layouts.master')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Transaksi</h3>
						</div>
						<div class="panel-body">
								<div class="col-lg-12">
								<a href="{{route('transaksi.create')}}" > Tambah Data </a>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Masuk</th>
										<th>Tanggal Keluar</th>
										<th>Batas Tempo</th>
                                        <th>Jumlah Bayar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($transaksi as $i=>$nilai) 
									<tr>
										<td>{{$i+1}}</td>
										<td>{{$nilai->tgl_masuk}}</td>
										<td>{{$nilai->tgl_keluar}}</td>
										<td>{{$nilai->batas_tempo}} </td>
										<td>{{$nilai->jumlah_bayar}}</td>
										<td>
											<a href="{{route('transaksi.edit',$nilai->id_transaksi)}}"> Update </a> |
											<form action="{{route('transaksi.destroy',$nilai->id_transaksi)}}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit">Delete</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							{{$transaksi->links()}}
							
							</div>
							</div>
							
						</div>
					</div>
@endsection