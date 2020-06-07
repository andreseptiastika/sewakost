@extends('layouts.master')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Transaksi</h3>
						</div>
						<div class="panel-body">
								<div class="col-lg-12">
								<a href="{{route('transaksi.create')}}" class="btn btn-info btn-sm" > Tambah Data </a>
								<br> <br>
						

							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>No Transaksi</th>
										<th>Tanggal Bayar</th>
										<th>Batas Tempo</th>
                                        <th>Jumlah Bayar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($transaksi as $i=>$nilai) 
									<tr>
										<td>{{$i+1}}</td>
										<td>{{$nilai->no_transaksi}}</td>
										<td>{{$nilai->tgl_bayar}}</td>
										<td>{{$nilai->batas_tempo}} </td>
										<td>{{$nilai->jumlah_bayar}}</td>
										<td>
										<form action="{{route('transaksi.destroy',$nilai->id_transaksi)}}" method="POST">
												@csrf
												@method('DELETE')
											<a href="{{route('transaksi.edit',$nilai->id_transaksi)}}" class="btn btn-primary btn-sm"> Edit </a> 
											
												<button type="submit" class="btn btn-danger btn-sm">Delete</button>
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