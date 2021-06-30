<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pembayaran</title>

    <style type="text/css">
        @page {
            margin: 0px;
            size: 595.28pt 311.81pt;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 7px;
        }
        .invoice table thead{
            margin: 3px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 4px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 35%;">
                <h3>{{ $siswa->nama }}</h3>
                <pre>
Kelas : {{ $kelas->nama_kelas }}
Jurusan : {{ $kelas->kompetensi_keahlian }}
<br>
Waktu: {{ $pay->waktu_bayar }}
Status: <b>Lunas</b>
                </pre>
            </td>
            <!-- <td align="center">
                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>
            </td> -->
            <td align="right" style="width: 35%;">

                <h3>SMKN 1 CIAMIS</h3>
                <pre>
                    https://smkn1ciamis.id

                    Jl. Jend. Sudirman
                    Lingk. Cibeureum No.269,
                    RT.01/RW.09, Sindangrasa,
                    Kec. Ciamis, Kabupaten Ciamis,
                    Jawa Barat 46215
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Bukti Pembayaran SPP</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Keterangan</th>
            <th>Bulan</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Pembayaran SPP Tahun {{ $pay->tahun_bayar }}</td>
            <td>{{ $pay->bulan_bayar }}</td>
            <td align="left">@currency($pay->jumlah_bayar)</td>
        </tr>
        </tbody>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; E-moer 2021
            </td>
            <td align="right" style="width: 50%;">
                * Simpan Bukti Ini Baik Baik
            </td>
        </tr>

    </table>
</div>
</body>
</html>