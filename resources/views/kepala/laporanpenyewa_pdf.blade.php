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
                    <h2><u>Laporan Penyewa</u></h2>
                </center>
                <br>
              </div>

               <div class="col-md-12">
<table class="table table-bordered">
                <thead>
                                <tr>
                    <th>No</th>
                    <th>Nama Penyewa</th>
                    <th>Jenis Identitas</th>
                    <th>Nomer Identitas</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                  </tr>
                </thead>
                <tbody>
                                @php $i=1 @endphp
                  @foreach ($penyewa as $nilai) 
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$nilai->nama}}</td>
                    <td>{{$nilai->jenis_identitas}}</td>
                    <td>{{$nilai->no_identitas}}</td>
                    <td>{{$nilai->telp}}</td>
                    <td>{{$nilai->alamat}}</td>
                  </tr>
                  @endforeach
      </tbody>
    </table>
              </div>
            </div>       

@endsection
 <script type="text/javascript">
      window.print();
     
    </script>