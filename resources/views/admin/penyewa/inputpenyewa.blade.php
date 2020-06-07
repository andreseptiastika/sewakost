@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Input Penyewa</h3>
	</div>
 
    	<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
                        <form action="{{(isset($penyewa))?route('penyewa.update', $penyewa->id_penyewa):route('penyewa.store')}}" method="POST">
                            @csrf
                            @if(isset($penyewa))?@method('PUT')@endif
                        <div class="panel-body">
                            <input type="text" value="{{(isset($penyewa))?$penyewa->nama:old('nama')}}" name="nama" class="form-control" placeholder="Nama penyewa ... ">   
                            @error('nama')<small style="color:red">{{$message}}</small>@enderror
                          
                          <br>
                          <select class="form-control" name="jenis_identitas" value="{{(isset($penyewa))?$penyewa->jenis_identitas:old('jenis_identitas')}}">
								<option value="">Pilih Jenis Identitas</option>
								<option value="KTP">KTP</option>
								<option value="SIM">SIM</option>
                                <option value="Kartu Pelajar">Kartu Pelajar</option>
							</select>

                          <br>  
                          <input type="number" value="{{(isset($penyewa))?$penyewa->no_identitas:old('no_identitas')}}" name="no_identitas" class="form-control"  placeholder="No Identitas ... ">
                            @error('no_identitas')<small style="color:red">{{$message}}</small>@enderror
                          						
                          
                        <br>

                        <input type="number" value="{{(isset($penyewa))?$penyewa->telp:old('telp')}}" name="telp" class="form-control"  placeholder="Telepon ... ">
                            @error('telp')<small style="color:red">{{$message}}</small>@enderror
                        <br>

                        	<textarea class="form-control" value="{{(isset($penyewa))?$penyewa->alamat:old('alamat')}}" name="alamat" placeholder="Alamat ..." rows="2">{{(isset($penyewa))?$penyewa->alamat:old('alamat')}}</textarea>
                            @error('alamat')<small style="color:red">{{$message}}</small>@enderror
                         
                                <br>
                            <input type="submit" class="btn btn-primary" value="Simpan">
						</div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    
</div>
@endsection