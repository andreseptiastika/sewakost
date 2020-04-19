@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Input Transaksi</h3>
	</div>
 
    	<div class="panel-body">
        <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
				<div class="panel-body">
				    <form action="{{(isset($transaksi))?route('transaksi.update', $transaksi->id_transaksi):route('transaksi.store')}}" method="POST">
                    
                        @csrf
                        @if(isset($transaksi))?@method('PUT')@endif
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Id Kamar</label>
                            <input type="text" name="id_kamar" class="form-control" id="exampleFormControlInput1" placeholder="Id Kamar" value="{{(isset($transaksi))?$transaksi->id_kamar:old('id_kamar')}}">
                            @error('id_kamar')<small style="color:red">{{$message}}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Id Penyewa</label>
                            <input type="text" name="id_penyewa" class="form-control" id="exampleFormControlInput1" placeholder="ID Penyewa" value="{{(isset($transaksi))?$transaksi->id_penyewa:old('id_penyewa')}}">
                            @error('id_penyewa')<small style="color:red">{{$message}}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang" value="{{(isset($transaksi))?$transaksi->tgl_masuk:old('tgl_masuk')}}">
                            @error('tgl_masuk')<small style="color:red">{{$message}}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal Keluar</label>
                            <input type="date" name="tgl_keluar" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang" value="{{(isset($transaksi))?$transaksi->tgl_keluar:old('tgl_keluar')}}">
                            @error('tgl_keluar')<small style="color:red">{{$message}}</small>@enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang" value="{{(isset($transaksi))?$transaksi->tgl_bayar:old('tgl_bayar')}}">    
                            @error('tgl_bayar')<small style="color:red">{{$message}}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Biaya</label>
                            <input type="number" name="biaya" class="form-control" id="exampleFormControlInput1" placeholder="Biaya" value="{{(isset($transaksi))?$transaksi->biaya:old('biaya')}}">
                            @error('biaya')<small style="color:red">{{$message}}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah Bayar" value="{{(isset($transaksi))?$transaksi->jumlah_bayar:old('jumlah_bayar')}}">
                            @error('jumlah_bayar')<small style="color:red">{{$message}}</small>@enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Batas Tempo </label>
                            <input type="date" name="batas_tempo" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang" value="{{(isset($transaksi))?$transaksi->batas_tempo:old('batas_tempo')}}">        
                            @error('batas_tempo')<small style="color:red">{{$message}}</small>@enderror
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
								</div>
							</div>

                    </div>
                </div>
        </div>
    
</div>
@endsection