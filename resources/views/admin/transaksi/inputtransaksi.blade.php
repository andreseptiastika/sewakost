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
                    <div class="col-md-12">
				    <form action="{{ route ('transaksi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No Transaksi</label>
                            <input type="text" name="no_transaksi" class="form-control" placeholder="No transaksi ... ">   
                            @error('no_transaksi')<small style="color:red">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Penyewa</label>
                            <select class="form-control" name="id_penyewa">
                                <option value="" holder>Pilih Penyewa</option>
                                @foreach($sewa as $result)
                                <option value="{{ $result->id_penyewa }}">{{ $result->penyewa->nama }}</option>
                                @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang">    
                            @error('tgl_bayar')<small style="color:red">{{$message}}</small>@enderror
                        </div>
                        <input type="hidden" name="status" class="form-control" id="exampleFormControlInput1" placeholder="Nama Belakang"
                        value="Belum Lunas">    
                       
                       
                         <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </div> 

                       
                    </form>
								</div>
							</div>

                    </div>
                </div>
        </div>
    
</div>
@endsection