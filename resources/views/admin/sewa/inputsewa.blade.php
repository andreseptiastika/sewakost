@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Input Sewa</h3>
	</div>
 
    	<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
                        <form action="{{(isset($sewa))?route('sewa.update', $sewa->id_sewa):route('sewa.store')}}" method="POST">
                            @csrf
                            @if(isset($sewa))?@method('PUT')@endif
                        <div class="panel-body">
                          <label>Nama Penyewa </label>
                          <select class="form-control" name="id_penyewa">
                            <option value="" holder>Pilih Penyewa</option>
                            @foreach($penyewa as $result)
                            <option value="{{ $result->id_penyewa }}">{{  $result->nama }}</option>
                            @endforeach
                          </select>
                        <br>
                        <label>Tanggal Sewa </label>
                        <input type="date" value="{{(isset($sewa))?$sewa->tgl_sewa:old('tgl_sewa')}}" name="tgl_sewa" class="form-control"  placeholder="No Identitas ... ">
                            @error('tgl_sewa')<small style="color:red">{{$message}}</small>@enderror
                        
                            <br>
                          <label for="exampleFormControlInput1">Fasilitas Tambahan</label>
							            <textarea class="form-control" value="{{(isset($sewa))?$sewa->fasilitas:old('fasilitas')}}" name="fasilitas" placeholder="Fasilitas ..." rows="2">
                            </textarea>
                            @error('fasilitas')<small style="color:red">{{$message}}</small>@enderror
                        <br>
                     
                            <label for="exampleFormControlInput1">Biaya Tambahan</label>
                            <input type="number" value="{{(isset($sewa))?$sewa->sewa:old('sewa')}}" name="biaya" class="form-control"  placeholder="Biaya Tambahan ... ">
                            @error('biaya')<small style="color:red">{{$message}}</small>@enderror
                                
                            <br>
                        <label>Tipe  </label>
                          <select class="form-control" name="tipe" value="{{(isset($sewa))?$sewa->tipe:old('tipe')}}">
                              <option value="">Pilih Tipe</option>
                              <option value="Bulanan">Bulanan</option>
                              <option value="Tahunan">Tahunan</option>
                          </select>
                          					
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