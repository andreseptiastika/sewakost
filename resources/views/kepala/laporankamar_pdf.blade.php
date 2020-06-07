<!DOCTYPE html>
<html>
<head>
	<title>Laporan Kamar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Kamar</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
        <tr>
                <th>No</th>
				<th>Nama Kamar</th>
				<th>Fasilitas</th>
    			<th>Status</th>
				<th>Harga Sewa</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($kamar as $nilai)
				<tr>
                <td>{{$i++}}</td>
				<td>{{$nilai->nama_kamar}}</td>
				<td>{{$nilai->fasilitas}}</td>
				<td>{{$nilai->status}}</td>		
                <td>{{$nilai->harga_sewa}}</td>
				</tr>
				@endforeach
		</tbody>
	</table>
 
</body>
</html>