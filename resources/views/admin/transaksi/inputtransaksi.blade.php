@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Input Transaksi</h3>
	</div>
 
    	<div class="panel-body">
        <div class="row">
                    <div class="panel">
				<div class="panel-body">
                    <div class="col-md-6">
				    <form action="{{ route ('transaksi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No Transaksi</label>
                            <input type="text" name="no_transaksi" class="form-control" placeholder="No transaksi ... ">   
                            @error('no_transaksi')<small style="color:red">{{$message}}</small>@enderror
                        </div>

                        

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Penyewa</label>
                            <select class="form-control" name="id_sewa">
                                <option value="" holder>Pilih Penyewa</option>
                                @foreach($sewa as $result)
                                <option value="{{ $result->id_sewa }}">{{  $result->penyewa->nama }}</option>
                                @endforeach
                          </select>
                          
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang">    
                            @error('tgl_bayar')<small style="color:red">{{$message}}</small>@enderror
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Biaya</label>
                            <input type="number" name="biaya" class="form-control" id="exampleFormControlInput1" placeholder="Biaya" >
                            @error('biaya')<small style="color:red">{{$message}}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah Bayar">
                            @error('jumlah_bayar')<small style="color:red">{{$message}}</small>@enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Batas Tempo </label>
                            <input type="date" name="batas_tempo" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang">        
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