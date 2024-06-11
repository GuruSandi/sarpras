<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    


    <title>Laporan Sebaran Sarpras</title>
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
    <h4 class="judul">Laporan Sebaran Sarpras</h4>
    <p class="subjudul">SD IT INSAN CERMAT</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Sarpras</th>
                <th>Tanggal</th>
                <th>Foto</th>
                <th>Nama Sarpras</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Penerima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->sarpras->kode_sarpras }}</td>
                    <td>
                        @if ($item->status == 'dipinjam')
                            {{ $item->tanggal_pinjam ? \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') : '' }}
                        @elseif($item->status == 'kembali')
                            {{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') : '' }}
                        @elseif($item->status == null)
                            {{ $item->tanggal_keluar ? \Carbon\Carbon::parse($item->tanggal_keluar)->format('d-m-Y') : '' }}
                        @endif
                    </td>
                    <td>
                        <img src="{{ public_path($item->sarpras->foto) }}" alt="Foto Sarana" width="100" height="100">
                    </td>
                    <td>
                        {{ $item->sarpras->nama_sarpras }}
                    </td>
                    <td>
                        {{ $item->jumlah }}
                    </td>
                    <td>
                        @if ($item->status == 'dipinjam')
                            {{ $item->status }}
                        @elseif($item->status == 'kembali')
                            {{ $item->status }}
                        @elseif($item->status == null)
                            Barang Keluar
                        @endif
                    </td>
                    <td>
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



    
</body>

</html>
