<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    


    <title>Laporan Peminjaman</title>
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
    <h4 class="judul">Laporan Barang Keluar</h4>
    <p class="subjudul">SD IT INSAN CERMAT</p>
    <table class="tabel tabel-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Sarpras</th>
                <th>Jumlah</th>
                <th>Penerima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangkeluar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>{{ $item->sarpras->kode_sarpras }}</td>
                    <td>{{ $item->sarpras->nama_sarpras }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->penerima }}</td>

                    
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
