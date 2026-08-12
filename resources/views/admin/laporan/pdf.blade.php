<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Laporan Penjualan</title>

    <style>

        body{

            font-family: DejaVu Sans, sans-serif;

            font-size:12px;

            color:#333;

        }

        h1{

            text-align:center;

            margin-bottom:5px;

        }

        .sub{

            text-align:center;

            margin-bottom:25px;

            color:#666;

        }

        table{

            width:100%;

            border-collapse:collapse;

            margin-top:20px;

        }

        th{

            background:#15803d;

            color:white;

            padding:10px;

            border:1px solid #ddd;

        }

        td{

            border:1px solid #ddd;

            padding:8px;

        }

        .right{

            text-align:right;

        }

        .center{

            text-align:center;

        }

        .footer{

            margin-top:25px;

            font-weight:bold;

            text-align:right;

        }

    </style>

</head>

<body>

    <h1>

        MEKAR MANDIRI

    </h1>

    <div class="sub">

        Laporan Penjualan

        <br>

        Dicetak :

        {{ now()->format('d-m-Y H:i') }}

    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Invoice</th>

                <th>Customer</th>

                <th>Total</th>

                <th>Pembayaran</th>

                <th>Status</th>

                <th>Tanggal</th>

            </tr>

        </thead>

        <tbody>
            @forelse($orders as $order)

            <tr>

                <td class="center">

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $order->kode_order }}

                </td>

                <td>

                    {{ $order->user->name }}

                </td>

                <td class="right">

                    Rp {{ number_format($order->total_harga,0,',','.') }}

                </td>

                <td class="center">

                    {{ $order->status_pembayaran }}

                </td>

                <td class="center">

                    {{ $order->status_pesanan }}

                </td>

                <td class="center">

                    {{ $order->created_at->format('d-m-Y') }}

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7" class="center">

                    Tidak ada data laporan.

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