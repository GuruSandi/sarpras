@extends('template.sidebar')
@section('title', 'Data Belum Kembali')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">


                        <table class="table tabel-bordered tabel-sm" id="example" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Sarpras</th>
                                    <th>Kondisi Pinjam</th>
                                    <th>Jumlah</th>
                                    <th>Peminjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($databelumkembali as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $item->tanggal_pinjam }}</td>

                                        <td>{{ $item->sarpras->kode_sarpras }}</td>
                                        <td>{{ $item->sarpras->nama_sarpras }}</td>
                                        <td>{{ $item->kondisi_pinjam }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->peminjam }}</td>
                                        <td>
                                            @if ($item->status == 'dipinjam')
                                                <div class="btn btn-sm" style="background-color: #dc3545; color: white">
                                                    Belum Dikembalikan

                                                </div>
                                            @endif
                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
