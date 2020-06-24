@extends('layouts.masterlaporan')

@section('content')

       <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
          

            <!-- /.box-header -->
            <div class="box-body">
           <div class="col-md-12">
              <center>
                  <h3><b>Kost Orchid</b></h3>
                    <h5>Jalan Raya Antosari-Pupuan Gang Nakula Nomer 11, Pujungan, Pupuan, Tabanan</h5>
                    <h2><u>Faktur Pembayaran Kost</u></h2>
                </center>
                <br>
              </div>


               <div class="col-md-12">
               </div>

          <br>

               <div class="col-md-6" style="width: 45%; float: left;" >
                <table class="table">
                @foreach ($transaksi as $result => $hasil)
                  <tr>
                    <td>No Transaksi</td>
                    <td>:</td>
                  	<td>{{$hasil->no_transaksi}} </td>
                  </tr>

                   <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                  	<td>{{$hasil->nama}}</td>
                  </tr>

                  <tr>
                    <td>Alamat Pelanggan</td>
                    <td>:</td>
                 	<td>{{$hasil->alamat}} </td>
                  </tr>

                  

              </table>

              </div>

               <div class="col-md-6" style="width: 45%; float: left ; margin-left: 10%">

                <table class="table">
                  <tr>
                    <td>Tanggal Bayar</td>
                    <td>:</td>
                  	<td> {{$hasil->tgl_bayar}}</td>
                  </tr>

                   <tr>
                    <td>Tipe</td>
                    <td>:</td>
                  	<td> {{$hasil->tipe}}</td>
                  </tr>

                  <tr>
                    <td>Fasilitas Tambahan</td>
                    <td>:</td>
                  	<td>{{$hasil->fasilitas}} </td>
                  </tr>

              </table>

              </div>

               <div class="col-md-12">

               <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Kamar</th>
                  <th>Harga</th>
                  <th>Biaya Tambahan</th>
                  <th>Sub Total</th>
                </tr>
                </thead>
                
                <tbody>
                <tr>
                  <td>{{$hasil->nama_kamar}}</td>
                  <td>Rp. {{number_format($hasil->harga_sewa)}}</td>
                  <td>Rp. {{number_format($hasil->biaya)}}</td>
                  <td>Rp. {{number_format($hasil->sub_total)}}</td>
                </tr>
                <tr>
                   <td colspan="3"><b>Cash</b></td>
                  <td>Rp. {{number_format($hasil->cash)}}</td>
                
                </tr>
                <tr>
                   <td colspan="3"><b>Kembalian</b></td>
                  <td>Rp. {{number_format($hasil->kembalian)}}</td>
                
                </tr>
                 
                </tbody>
              @endforeach
              </table>

              </div>
            </div>       

@endsection
 <script type="text/javascript">
      window.print();
     
    </script>