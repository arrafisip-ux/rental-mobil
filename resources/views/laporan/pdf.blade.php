<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Laporan Penyewaan</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            margin:40px;
            color:#222;
        }

        h1{
            text-align:center;
            margin-bottom:5px;
        }

        p{
            text-align:center;
            margin-bottom:30px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid #000;
            padding:8px;
            font-size:13px;
        }

        th{
            background:#efefef;
        }

        .right{
            text-align:right;
        }

        .footer{
            margin-top:30px;
            text-align:right;
            font-size:18px;
            font-weight:bold;
        }

    </style>

</head>

<body>

<h1>

    LAPORAN PENYEWAAN MOBIL

</h1>

<p>

    Sistem Informasi Rental Mobil

</p>

<table>

    <thead>

        <tr>

            <th>No</th>

            <th>No Transaksi</th>

            <th>Pelanggan</th>

            <th>Mobil</th>

            <th>Tanggal Pinjam</th>

            <th>Status</th>

            <th>Total</th>

        </tr>

    </thead>

    <tbody>

    @forelse($laporans as $item)

        <tr>

            <td>

                {{ $loop->iteration }}

            </td>

            <td>

                {{ $item->no_transaksi }}

            </td>

            <td>

                {{ $item->pelanggan->nama }}

            </td>

            <td>

                {{ $item->mobil->merk }}
                {{ $item->mobil->tipe }}

            </td>

            <td>

                {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}

            </td>

            <td>

                {{ $item->status }}

            </td>

            <td class="right">

                Rp {{ number_format($item->total_bayar,0,',','.') }}

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="7" style="text-align:center">

                Tidak ada data

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<div class="footer">

    Total Pendapatan :

    Rp {{ number_format($totalPendapatan,0,',','.') }}

</div>

</body>

</html>