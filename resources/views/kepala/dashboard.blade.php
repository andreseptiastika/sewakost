@extends('layouts.masterkepala')

@section('content')
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Aplikasi Pembayaran Kost Orchid</h3>
							<p class="panel-subtitle">Jalan Raya Antosari-Pupuan Gang Nakula Nomer 11, Pujungan, Pupuan, Tabanan</p>
						</div>

						<div class="panel-body">
							<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i>  Selamat Datang , Gunakan akun sebaik-baiknya 
									</div>
									
							<div class="row">
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-database"></i></span>
										<p>
											<span class="number">{{$kamar}}</span>
											<span class="title">Laporan Kamar</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number">{{$penyewa}}</span>
											<span class="title">Laporan Penyewa</span>
										</p>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-credit-card"></i></span>
										<p>
											<span class="number">{{$transaksi}}</span>
											<span class="title">Laporan Tagihan</span>
										</p>
									</div>
								</div>
							</div>
							
							</div>
						</div>
					</div>
@endsection