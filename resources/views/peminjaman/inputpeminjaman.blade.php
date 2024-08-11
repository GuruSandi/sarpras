@extends('template.sidebar')
@section('title', 'Menu Peminjaman')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-6">
                        @if (Session::has('status'))
                            <div class="pesan pesan-success d-flex justify-content-between align-items-center position-fixed top-0 end-0"
                                style="font-size: 13px; z-index: 1050; width: 410px;">
                                <div class="mr-auto" style="font-weight: bold"> <i class="bi bi-check-circle"></i> Success: {{ Session::get('status') }}</div>
                                <!-- mr-auto untuk memberikan margin kanan otomatis agar teks sejajar dengan tombol close -->
                                <button type="button" class="close ml-2" data-dismiss="pesan" aria-label="Close">
                                    <!-- ml-2 untuk memberikan margin kiri -->
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#pilihbarang">
                            <i class="bi bi-plus-circle"></i> Pilih Barang
                        </button>
                        
                        <table class="table tabel-bordered tabel-sm" id="example" style="font-size: 12px" >
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
                                @foreach ($peminjaman as $item)
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
                                                    data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                                    <i class="bi bi-book " style="color: white"></i>
                                                </button>
                                                <a href="{{ route('editpeminjaman', $item->id) }}"
                                                    class="btn btn-warning btn-sm"> <i class="bi bi-pencil " style="color: white"></i></a>
                                                
                                                <button type="button" class="btn btn-sm btn-danger mx-1"
                                                    data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}">
                                                    <i class="bi bi-trash " style="color: white"></i>
                                                </button>
                                                



                                            </div>
                                        </td>
                                    </tr>
                                    @include('peminjaman.detailpeminjaman')
                                    @include('peminjaman.hapuspeminjaman')
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('peminjaman.pilihbarang')
    <!-- Script untuk menyimpan daftar barang yang dipilih -->


@endsection
