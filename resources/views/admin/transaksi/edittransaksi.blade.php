@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Edit Transaksi</h3>
	</div>
 
    	<div class="panel-body">
        <div class="row">
                    <div class="panel">
				<div class="panel-body">
                    <div class="col-md-6">
				    <form action="{{ route('transaksi.update', $transaksi->id_transaksi ) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No Transaksi</label>
                            <input type="text" name="no_transaksi" class="form-control" placeholder="No transaksi ... " value="{{(isset($transaksi))?$transaksi->no_transaksi:old('no_transaksi')}}">   
                            @error('no_transaksi')<small style="color:red">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Penyewa</label>
                            <select class="form-control" name="id_sewa">
                                <option value="" holder>Pilih Penyewa</option>
                                @foreach($sewa as $result)
                                <option value="{{ $result->id_sewa }}"
                                    @if($result->id_sewa == $transaksi->id_sewa)
                                        selected
                                    @endif
                                >{{  $result->penyewa->nama }}</option>
                                @endforeach
                          </select>

                         
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang" value="{{(isset($transaksi))?$transaksi->tgl_bayar:old('tgl_bayar')}}">    
                            @error('tgl_bayar')<small style="color:red">{{$message}}</small>@enderror
                        </div>
                    </div> 
                    <div class="col-md-6">
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