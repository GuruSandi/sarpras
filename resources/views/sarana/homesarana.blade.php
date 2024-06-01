@extends('template.sidebar')
@section('title', 'Menu Sarana')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-5">
                @if (Session::has('status'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <strong class="mr-auto">Success: {{ Session::get('status') }}</strong>
                        <!-- mr-auto untuk memberikan margin kanan otomatis agar teks sejajar dengan tombol close -->
                        <button type="button" class="close ml-2" data-dismiss="alert" aria-label="Close">
                            <!-- ml-2 untuk memberikan margin kiri -->
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="col-9">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambahSaranaModal">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </button>

                    </div>
                    <div class="col-3">
                        <a href="{{ route('cetakpdf') }}" class="btn btn-sm btn-danger"> <i class="bi bi-file-pdf"></i>
                            Cetak PDF</a>
                        <a href="{{ route('exportDataSarana') }}" class="btn btn-sm btn-success"> <i
                                class="bi bi-file-excel"></i> Export Excel</a>

                    </div>
                </div>
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Stok</th>
                            <th>Penerima Barang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sarana as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_sarpras }}</td>
                                <td>{{ $item->nama_sarpras }}</td>
                                <td>
                                    <img src="{{ asset($item->foto) }}" alt="" width="100" height="100">
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
                                <td>
                                    <div class="btn-group">

                                        <button type="button" class="btn btn-sm btn-info mx-1" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $item->id }}">
                                            <i class="bi bi-book " style="color: white"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-warning mx-1" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}">
                                            <i class="bi bi-pencil " style="color: white"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger mx-1" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal{{ $item->id }}">
                                            <i class="bi bi-trash " style="color: white"></i>
                                        </button>



                                    </div>
                                </td>
                            </tr>
                            @include('sarana.editsarana')
                            @include('sarana.hapussarana')
                            @include('sarana.detailsarana')
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @include('sarana.tambahsarana')

@endsection
