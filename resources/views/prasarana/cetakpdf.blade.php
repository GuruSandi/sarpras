<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    


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
            font-size: 20px;
            /* Ukuran font judul */
            text-align: center;
        }

        .subjudul {
            font-weight: bold;
            /* Style font bold untuk subjudul */
            font-size: 16px;
            text-align: center;
            padding-bottom: 50px;


            /* Ukuran font subjudul */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;

        }

        th,
        td {
            border: 1px solid #000000;
            padding: 8px;
            text-align: center;


        }
        thead {
            background-color: rgb(163, 188, 255);
            padding: 5px;
            
        }
    </style>
</head>

<body>
    <h4 class="judul">Data Prasarana Sekolah</h4>
    <p class="subjudul">SD IT INSAN CERMAT</p>
    <table class="tabel tabel-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Stok</th>
                <th>Penerima Barang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prasarana as $index => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d m Y') }}</td>

                    <td>{{ $item->kode_sarpras }}</td>
                    <td>{{ $item->nama_sarpras }}</td>
                    <td>
                        <img src="{{ public_path($item->foto) }}" alt="Foto Sarana" width="100" height="100">
                    </td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->penerima_barang }}</td>
                    <td>
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
