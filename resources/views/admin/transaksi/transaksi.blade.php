@extends('layouts.master')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Tagihan</h3>
						</div>
						<div class="panel-body">
							@if (session('success'))
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-info-circle"></i>  {{ session('success') }}
							</div>
							@endif
								<div class="col-lg-12">
								<a href="{{route('transaksi.create')}}" class="btn btn-success btn-sm" > Tambah Data </a>
								<br>
								<br>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>No Transaksi</th>
										<th>Nama</th>
										<th>Biaya Kost</th>
                                        <th>Biaya Tambahan</th>
                                        <th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($transaksi as $i=>$nilai) 
									<tr>
										<td>{{$i+1}}</td>
										<td>{{$nilai->no_transaksi}}</td>
										<td>{{$nilai->nama}}</td>
										<td>Rp. {{number_format($nilai->harga_sewa)}} </td>
										<td>Rp. {{number_format($nilai->biaya)}}</td>
										<td>{{$nilai->status}}</td>
										<td>
										
											<a href="{{route('transaksi.edit',$nilai->id_penyewa)}}" class="btn btn-primary btn-sm" title="Bayar"> <i class="fa fa-money"></i>  </a> 

											<a href="{{route('transaksi.print',$nilai->id_penyewa)}}" class="btn btn-danger btn-sm" title="Print"> <i class="fa fa-print"></i> </a> 
											

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