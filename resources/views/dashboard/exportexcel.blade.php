<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icon/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <title>Sebaran Sarana Prasarana</title>
    <style>
        /* CSS untuk mengatur style font */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            /* Ukuran font */
        }

        .judul {
            font-weight: bold;
            /* Style font bold untuk judul */
            font-size: 16px;
            /* Ukuran font judul */
            text-align: center;
        }

        .subjudul {
            font-weight: bold;
            /* Style font bold untuk subjudul */
            font-size: 14px;
            /* Ukuran font subjudul */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;



        }
    </style>
</head>

<body>
    <h4 class="judul">Data Sarana Sekolah</h4>
    <p class="subjudul">SD IT INSAN CERMAT</p>
    <p class="subjudul">Tahun Pelajaran </p>
    <table class="tabel tabel-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th style=" width:100px; text-align: center;">Kode Sarpras</th>
                <th style=" text-align: center; width:100px;">Tanggal</th>
                <th style=" text-align: center;">Foto</th>
                <th style=" width:150px; text-align: center;">Nama Sarpras</th>
                <th style=" text-align: center;  width:100px;">Status</th>
                <th style=" width:150px; text-align: center;">Penerima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td style=" text-align: center;">{{ $loop->iteration }}</td>
                    <td style=" text-align: center;">{{ $item->sarpras->kode_sarpras }}</td>
                    <td style=" text-align: center;">
                        @if ($item->status == 'dipinjam')
                            {{ $item->tanggal_pinjam ? \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') : '' }}
                        @elseif($item->status == 'kembali')
                            {{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') : '' }}
                        @elseif($item->status == null)
                            {{ $item->tanggal_keluar ? \Carbon\Carbon::parse($item->tanggal_keluar)->format('d-m-Y') : '' }}
                        @endif
                    </td>
                    <td style=" text-align: center;">
                        <img src="{{ public_path($item->sarpras->foto) }}" alt="Foto Sarana" width="100"
                            height="100">
                    </td>
                    <td style=" text-align: center;">
                        {{ $item->sarpras->nama_sarpras }}
                    </td>
                    <td style=" text-align: center;">
                        @if ($item->status == 'dipinjam')
                            {{ $item->status }}
                        @elseif($item->status == 'kembali')
                            {{ $item->status }}
                        @elseif($item->status == null)
                            Barang Keluar
                        @endif
                    </td>
                    <td style=" text-align: center;">
                        @if ($item->status == 'dipinjam')
                            {{ $item->peminjam }}
                        @elseif($item->status == 'kembali')
                            {{ $item->peminjam }}
                        @elseif($item->status == null)
                            {{ $item->penerima }}
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>



    <script src="{{ asset('/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        new DataTable('#example');
    </script>

</body>

</html>
