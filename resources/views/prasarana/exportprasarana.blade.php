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


    <title>Data Prasarana</title>
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
    <h4 class="judul">Data Prasarana Sekolah</h4>
    <p class="subjudul">SD IT INSAN CERMAT</p>
    <p class="subjudul">Tahun Pelajaran </p>
    <table class="tabel tabel-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th style=" text-align: center;">Tanggal</th>
                <th style=" width:100px; text-align: center;">Kode Barang</th>
                <th style=" width:150px; text-align: center;">Nama</th>
                <th style=" text-align: center;">Foto</th>
                <th style=" text-align: center;">Stok</th>
                <th style=" width:150px; text-align: center;">Penerima Barang</th>
                <th style=" text-align: center;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prasarana as $index => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style=" text-align: center;">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d m Y') }}</td>

                    <td style=" text-align: center;">{{ $item->kode_sarpras }}</td>
                    <td style=" text-align: center;">{{ $item->nama_sarpras }}</td>
                    <td >
                        <img src="{{ public_path($item->foto) }}" alt="Foto Sarana" width="100" height="100">
                    </td>
                    
                    <td style=" text-align: center;">{{ $item->stok }}</td>
                    <td style=" text-align: center;">{{ $item->penerima_barang }}</td>
                    <td style=" text-align: center;">
                        @if ($item->status == 'tidak')
                            Tidak Aktif
                        @elseif ($item->status == 'aktif')
                            Aktif
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
