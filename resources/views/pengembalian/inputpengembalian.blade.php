@extends('template.sidebar')
@section('title', 'Input Pengembalian')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">

                        @foreach ($pengembalian as $item)
                            <!-- Modal Form Edit -->

                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="editModal{{ $item->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModal{{ $item->id }}Label">Pengembalian</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Confirmation Message -->
                                            <p>Apakah Anda yakin ingin Mengembalikan {{ $item->sarpras->nama_sarpras }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Form Submission for Deletion -->
                            
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                            
                                            <a href="{{ route('posteditpengembalian', $item->id) }}" class="btn btn-primary">Ya, Kembalikan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengembalian as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $item->tanggal_pinjam }}</td>
                                        <td>{{ $item->sarpras->kode_sarpras }}</td>
                                        <td>{{ $item->sarpras->nama_sarpras }}</td>
                                        <td>{{ $item->kondisi_pinjam }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->peminjam }}</td>
                                        <td>{{ $item->status }}</td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-success mx-1"
                                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                    Kembalikan
                                                </button>
                                            </div>
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
