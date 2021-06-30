<table>
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