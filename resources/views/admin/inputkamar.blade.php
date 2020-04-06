@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Input Kamar</h3>
	</div>
 
    	<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
                        <form action="{{(isset($kamar))?route('kamar.update', $kamar->id_kamar):route('kamar.store')}}" method="POST">
                            @csrf
                            @if(isset($kamar))?@method('PUT')@endif
                        <div class="panel-body">
							<input type="text" value="{{(isset($kamar))?$kamar->nama_kamar:old('nama_kamar')}}" name="nama_kamar" class="form-control" placeholder="Nama Kamar ... ">   
                            @error('nama_kamar')<small style="color:red">{{$message}}</small>@enderror
                          <br>
							<textarea class="form-control" value="{{(isset($kamar))?$kamar->fasilitas:old('fasilitas')}}" name="fasilitas" placeholder="Fasilitas ..." rows="2"></textarea>
                            @error('fasilitas')<small style="color:red">{{$message}}</small>@enderror
                          <br>
							<select class="form-control" name="status" value="{{(isset($kamar))?$kamar->status:old('status')}}">
								<option value="">Pilih Status</option>
								<option value="Terisi">Terisi</option>
								<option value="Kosong">Kosong</option>
							</select>
                            @error('status')<small style="color:red">{{$message}}</small>@enderror
								<br>
                            <input type="number" value="{{(isset($kamar))?$kamar->harga_sewa:old('harga_sewa')}}" name="harga_sewa" class="form-control"  placeholder="Harga Sewa ... ">
                            @error('harga_sewa')<small style="color:red">{{$message}}</small>@enderror
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