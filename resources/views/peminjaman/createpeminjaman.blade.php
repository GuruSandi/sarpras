@extends('template.sidebar')
@section('title', 'Input Peminjaman')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#pilihbarang">
                            <i class="bi bi-plus-circle"></i> Ganti Barang
                        </button>
                        <p>Barang yang Dipilih</p>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $barang->kode_sarpras }}</td>
                                    <td>{{ $barang->nama_sarpras }}</td>
                                    <td>
                                        <img src="{{ asset($barang->foto) }}" alt="" width="100" height="100">
                                    </td>
                                    <td>{{ $barang->stok }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <form action="{{ route('createpeminjaman') }}" class="form-group" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            <input type="hidden" name="sarpras_id" value="{{ $barang->id }}" required>
                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" required name="tanggal_pinjam">
                            <label for="kondisi_pinjam" class="form-label">Kondisi Pinjam</label>
                            <input type="text" class="form-control" required name="kondisi_pinjam">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" required name="jumlah">
                            <label for="peminjam" class="form-label">Peminjam</label>
                            <input type="text" class="form-control" required name="peminjam">

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('peminjaman.pilihbarang')
    <!-- Script untuk menyimpan daftar barang yang dipilih -->


@endsection
