<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Laporan PKL</title>

    <style>

        @page {
            margin: 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #111827;
        }

        h2 {
            text-align: center;
            margin: 0 0 5px 0;
            font-size: 18px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
            font-size: 11px;
            color: #555;
        }

        .info {
            margin-bottom: 15px;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f3f4f6;
            font-weight: bold;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 7px;
            text-align: left;
        }

        th:first-child,
        td:first-child {
            width: 35px;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #666;
        }

    </style>

</head>

<body>

    <h2>LAPORAN PKL SISWA</h2>

    <div class="subtitle">
        Rekap Data Pengajuan PKL
    </div>


    <div class="info">

        @if($tahun)
            <strong>Tahun:</strong>
            {{ $tahun }}
        @endif

        @if($tempatPkl)

            @if($tahun)
                &nbsp;&nbsp; | &nbsp;&nbsp;
            @endif

            <strong>Tempat PKL:</strong>
            {{ $tempatPkl->nama_perusahaan }}

        @endif

        @if(!$tahun && !$tempatPkl)
            <strong>Periode:</strong>
            Semua Data
        @endif

    </div>


    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Tanggal Pengajuan</th>

                <th>Nama Siswa</th>

                <th>NIS</th>

                <th>Tempat PKL</th>

                <th>Status</th>

            </tr>

        </thead>


        <tbody>

            @forelse($laporans as $laporan)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>

                        @if($laporan->tanggal_pengajuan)

                            {{ \Carbon\Carbon::parse($laporan->tanggal_pengajuan)->format('d F Y') }}

                        @else

                            -

                        @endif

                    </td>

                    <td>
                        {{ $laporan->siswa->nama ?? '-' }}
                    </td>

                    <td>
                        {{ $laporan->siswa->nis ?? '-' }}
                    </td>

                    <td>
                        {{ $laporan->tempatPkl->nama_perusahaan ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $laporan->status ?? '-' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="center">
                        Tidak ada data laporan.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <div class="footer">

        Dicetak pada:
        {{ now()->format('d F Y H:i') }}

    </div>

</body>
</html>