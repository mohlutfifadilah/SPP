<html>
<head>
	<title>Laporan Pembayaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
	</style>
	<center>
		<h1>Laporan Pembayaran</h4>
	</center>
 
	<table class="table table-bordered">
		<thead>
            <tr>
                <th>No</th>
                <th>Kode SPP</th>
                <th>Nama Siswa</th>
                <th>Bulan Bayar</th>
                <th>Total Bayar</th>
                <th>Dikonfirmasi Oleh</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pay as $p)
            <tr>
                <th> {{ $loop->iteration }} </th>
                <td> {{ $p->id_spp }} </td>
                <td> {{ $siswa->nama }} <br> ( {{ $p->nis }} ) </td>
                <td> {{ $p->bulan_bayar }} ({{ $p->tahun_bayar }})</td>
                <td> @currency($p->jumlah_bayar)</td>
                <td> {{ $petugas->nama_petugas }} <br> ( {{ $petugas->nip }} ) </td>
                <td> {{ $p->waktu_bayar }} </td>
            </tr>
            @endforeach
        </tbody>
	</table>
 
</body>
</html>