<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prasarana Export</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h4 class="judul">Data Prasarana Sekolah</h4>
    <p class="subjudul">SD IT INSAN CERMAT</p>
    <p class="subjudul">Tahun Pelajaran</p>
    <p class="subjudul">Jenis Prasarana:
        @if ($prasarana->isNotEmpty())
            @if ($prasarana->first()->jenis_prasarana == 'gedung')
                Gedung
            @elseif($prasarana->first()->jenis_prasarana == 'laboratorium')
                Laboratorium
            @elseif($prasarana->first()->jenis_prasarana == 'perpustakaan')
                Perpustakaan
            @elseif($prasarana->first()->jenis_prasarana == 'saranaolahraga')
                Sarana Olahraga
            @endif
        @else
            Tidak dipilih
        @endif



    </p>

    <table>
        <thead>
            <tr>
                <th>Kode Prasarana</th>
                <th>Jenis Prasarana</th>
                <th>Nama Prasarana</th>
                <th>Foto</th>
                <th>Kondisi Bangunan</th>

                @if ($prasarana->isNotEmpty())
                    @if ($prasarana->first()->jenis_prasarana == 'gedung')
                        <th>Jumlah Lantai</th>
                        <th>Jumlah Ruang Kelas</th>
                        <th>Kapasitas Ruang</th>
                        <th>Fasilitas Listrik</th>
                        <th>Sanitasi</th>
                    @elseif($prasarana->first()->jenis_prasarana == 'laboratorium')
                        <th>Jenis Laboratorium</th>
                        <th>Peralatan yang Tersedia</th>
                    @elseif($prasarana->first()->jenis_prasarana == 'perpustakaan')
                        <th>Jumlah Buku</th>
                        <th>Jenis Koleksi</th>
                        <th>Fasilitas Komputer</th>
                        <th>Luas Ruang Baca</th>
                    @elseif($prasarana->first()->jenis_prasarana == 'saranaolahraga')
                        <th>Jenis Lapangan</th>
                        <th>Ukuran Lapangan</th>
                        <th>Kondisi Lapangan</th>
                    @endif
                @else
                    <th>Fungsi Prasarana</th>
                    <th>Status Penggunaan</th>
                    <th>Kapasitas Penggunaan</th>
                @endif

                <th>Tahun Pembangunan</th>
                <th>Sumber Dana</th>
                <th>Luas Bangunan</th>
                <th>Status Kepemilikan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prasarana as $item)
                <tr>
                    <td>{{ $item->kode_sarpras }}</td>
                    <td>
                        @if ($item->jenis_prasarana == 'gedung')
                            Gedung
                        @elseif($item->jenis_prasarana == 'laboratorium')
                            Laboratorium
                        @elseif($item->jenis_prasarana == 'perpustakaan')
                            Perpustakaan
                        @elseif($item->jenis_prasarana == 'saranaolahraga')
                            Sarana Olahraga
                        @else
                            Tidak dipilih
                        @endif
                    </td>
                    <td>{{ $item->nama_sarpras }}</td>
                    <td>
                        <img src="{{ public_path($item->foto) }}" alt="Foto Sarana" width="100" height="100">
                    </td>
                    <td>{{ $item->kondisi_barang }}</td>

                    @if ($item->jenis_prasarana == 'gedung')
                        <td>{{ $item->jumlahruang ?? 'N/A' }}</td>
                        <td>{{ $item->jumlah_ruang_kelas ?? 'N/A' }}</td>
                        <td>{{ $item->kapasitas_ruang ?? 'N/A' }}</td>
                        <td>{{ $item->fasilitas_listrik ?? 'N/A' }}</td>
                        <td>{{ $item->sanitasi ?? 'N/A' }}</td>
                    @elseif($item->jenis_prasarana == 'laboratorium')
                        <td>{{ $item->jenis_laboratorium ?? 'N/A' }}</td>
                        <td>{{ $item->peralatan_tersedia ?? 'N/A' }}</td>
                    @elseif($item->jenis_prasarana == 'perpustakaan')
                        <td>{{ $item->jumlah_buku ?? 'N/A' }}</td>
                        <td>{{ $item->jenis_koleksi ?? 'N/A' }}</td>
                        <td>{{ $item->fasilitas_komputer ?? 'N/A' }}</td>
                        <td>{{ $item->luas_ruang_baca ?? 'N/A' }}</td>
                    @elseif($item->jenis_prasarana == 'saranaolahraga')
                        <td>{{ $item->jenis_lapangan ?? 'N/A' }}</td>
                        <td>{{ $item->ukuran_lapangan ?? 'N/A' }}</td>
                        <td>{{ $item->kondisi_lapangan ?? 'N/A' }}</td>
                    @else
                        <td>{{ $item->fungsi_prasarana ?? 'Tidak Diketahui' }}</td>
                        <td>
                            @if ($item->status == 'tidak')
                                Tidak Aktif
                            @elseif ($item->status == 'aktif')
                                Aktif
                            @elseif ($item->status == 'diperbaiki')
                                Sedang diperbaiki
                            @endif
                        </td>
                        <td>{{ $item->kapasitas_penggunaan ?? 'Tidak Diketahui' }}</td>
                    @endif

                    <td>{{ $item->tahun_pembangunan }}</td>
                    <td>{{ $item->sumber_dana }}</td>
                    <td>{{ $item->luas_bangunan }} m²</td>
                    <td>{{ $item->status_kepemilikan }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
