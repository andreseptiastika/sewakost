@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Detail Sewa</h3>
	</div>
 
    	<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
                <table class="table">
                @foreach ($sewa as $result => $hasil)
                  <tr>
                   <tr>
                    <td>Nama Penyewa</td>
                    <td>:</td>
                    <td> {{$hasil->nama}} </td>     
                  </tr>

                  <tr>
                    <td>Alamat Penyewa</td>
                    <td>:</td>
                    <td>{{$hasil->alamat}} </td>
                  </tr>

                  <tr>
                    <td>Fasilitas Tambahan </td>
                    <td>:</td>
                    <td>{{$hasil->fasilitas}}</td>
                  </tr>

                   <tr>
                    <td>Biaya Tambahan </td>
                    <td>:</td>
                    <td>Rp. {{number_format($hasil->biaya)}}</td>
                  </tr>

                  <tr>
                    <td> Harga Sewa </td>
                    <td>:</td>
                    <td>Rp. {{number_format($hasil->harga_sewa)}}</td>
                  </tr>
                @endforeach
              </table>
              			</div>
                          <a href="/sewa" rel="noopener noreferrer" class="btn btn-danger pull-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    
</div>
@endsection