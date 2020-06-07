@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Edit sewa</h3>
	</div>
 
    	<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
                        <form action="{{ route('sewa.update', $sewa->id_sewa ) }}" method="POST">
                            @csrf
                            @method('PUT')

                        <div class="panel-body">
                          <label>Nama Penyewa </label>
                          <select class="form-control" name="id_penyewa">
                            <option value="" holder>Pilih Nama Penyewa</option>
                            @foreach($penyewa as $result)
                            <option value="{{ $result->id_penyewa }}"
                            @if($result->id_penyewa == $sewa->id_penyewa)
                                selected
                            @endif
                                >{{  $result->nama }}</option>
                            @endforeach
                        </select>
                          
                          
                          <br>

                          <label>Nama Kamar </label>
                          <select class="form-control" name="id_kamar">
                            <option value="" holder>Pilih Nama Kamar</option>
                            @foreach($kamar as $result)
                            <option value="{{ $result->id_kamar }}"
                            @if($result->id_kamar == $sewa->id_kamar)
                                selected
                            @endif
                                >{{  $result->nama_kamar }}</option>
                            @endforeach
                        </select>
                
                        
                        <br>
                        <label>Tanggal Sewa </label>
                        <input type="date" value="{{(isset($sewa))?$sewa->tgl_sewa:old('tgl_sewa')}}" name="tgl_sewa" class="form-control"  placeholder="No Identitas ... ">
                            @error('tgl_sewa')<small style="color:red">{{$message}}</small>@enderror
                        
                        <br>
                        <label>Tipe  </label>
                          <select class="form-control" name="tipe" value="{{(isset($sewa))?$sewa->tipe:old('tipe')}}">
                              <option value="">Pilih Tipe</option>
                              <option value="Bulanan"{{($sewa->tipe === 'Bulanan') ? 'Selected' : ''}} >Bulanan</option>
                              <option value="Tahunan" {{($sewa->tipe === 'Tahunan') ? 'Selected' : ''}} >Tahunan</option>
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