@extends('layouts.master')

@section('content')
<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Bayar </h3>
	</div>
 
    	<div class="panel-body">
        <div class="row">
            <div class="panel">
				@foreach ($transaksi as $result => $hasil)
                <form action="{{route('transaksi.update',$hasil->id_penyewa)}}" method="POST">
                     @csrf
                     @method('PUT')
                <div class="panel-body">
              <div class="col-md-6">
                 
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> No Transaksi </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Tanggal Bayar" name="no_transaksi" value="{{$hasil->no_transaksi}}" readonly>
                  </div>
                </div>

                <br>
                <br>

                   <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Nama </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" name="nama" value="{{$hasil->nama}}" readonly>
                  </div>
                </div>

                <br>
                <br>

               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Telepon  </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" name="telepon" value="{{$hasil->telp}}" readonly>
                  </div>
                </div>

                <br>
                <br>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Alamat  </label>
                  <div class="col-sm-9">
                    <textarea class="form-control" readonly> {{$hasil->alamat}}</textarea>
                  </div>
                </div>

                <br>
                <br>
                <br>

                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Harga Sewa </label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control" id="inputPassword3" name="harga_sewa" value="{{number_format($hasil->harga_sewa)}}">
                  </div>
                </div>
          </div>

          <div class="col-md-6">
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Biaya Tambahan  </label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control" id="inputPassword3" placeholder="Tanggal Bayar" name="tanggal" value="{{ number_format($hasil->biaya) }}">
                  </div>
                </div>

            <br>
            <br>
             <div class="form-group">
                 <label for="inputPassword3" class="col-sm-3 control-label"> Total  </label>
                <div class="col-sm-9">
                     <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Harga Sewa</th>
                          <th>Biaya Tambahan </th>
                          <th>Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>{{number_format($hasil->harga_sewa)}}</td>
                          <td>{{number_format($hasil->biaya)}}</td>
                          <td><input type="hidden" name="sub_total" readonly value="{{($hasil->harga_sewa + $hasil->biaya)}}">{{number_format($hasil->harga_sewa + $hasil->biaya)}}</td>
                        </tbody>
                        
                      </table>
                  </div>
                

                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Cash </label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control" id="inputPassword3" placeholder="Cash" name="cash">
                  </div>
                </div>

                @endforeach
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">  </label>
                  <div class="col-sm-9">
                  <input type="submit" class="btn btn-primary " value="Simpan" style="margin-top: 20px; margin-right: 10px"> 
                 <a href="/transaksi" class="btn btn-danger" style="margin-top: 20px"> Keluar</a>
                     
                  </div>
                </div>
            
                
                </div>
                </form>        

</div>

@endsection