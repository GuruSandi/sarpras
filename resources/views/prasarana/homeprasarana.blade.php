@extends('template.sidebar')
@section('title', 'Menu Prasarana')

@section('content')

    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-6">
                        @if (Session::has('status'))
                            <div class="pesan pesan-success d-flex justify-content-between align-items-center position-fixed top-0 end-0"
                                style="font-size: 13px; z-index: 1050; width: 300px;">
                                <div class="mr-auto" style="font-weight: bold"> <i class="bi bi-check-circle"></i> Success:
                                    {{ Session::get('status') }}</div>
                                <!-- mr-auto untuk memberikan margin kanan otomatis agar teks sejajar dengan tombol close -->
                                <button type="button" class="close ml-2" data-dismiss="pesan" aria-label="Close">
                                    <!-- ml-2 untuk memberikan margin kiri -->
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-9">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambahPrasaranaModal">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </button>
                    </div>
                    <div class="col-3">
                        {{-- <a href="{{ route('cetak-pdf') }}" class="btn btn-sm btn-danger"> <i class="bi bi-file-pdf"></i>
                            Cetak PDF</a> --}}
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#ExportModal">
                                <i class="bi bi-file-pdf"></i> Export Excel
                            </button>
                        </div>


                        @include('prasarana.exportmodal')
                    </div>
                </div>
                <table class="table table-bordered" id="example" style="font-size: 9px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Prasarana</th>
                            <th>Nama Prasarana</th>
                            <th>Foto</th>
                            <th>Jenis Prasarana</th>
                            <th>Kondisi Bangunan</th>
                            <th>Tahun Pembangunan</th>
                            <th>Sumber Dana</th>
                            <th>Luas Bangunan</th>
                            <th>Status Kepemilikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prasarana as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_sarpras }}</td>
                                <td>{{ $item->nama_sarpras }}</td>
                                <td>
                                    <img src="{{ asset($item->foto) }}" alt="" width="100" height="100">
                                </td>
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
                                <td>{{ $item->kondisi_barang }}</td>
                                <td>{{ $item->tahun_pembangunan }}</td>
                                <td>{{ $item->sumber_dana }}</td>
                                <td>{{ $item->luas_bangunan }}</td>
                                <td>{{ $item->status_kepemilikan }}</td>
                                {{-- <td>
                                    @if ($item->status == 'tidak')
                                        Tidak Aktif
                                    @elseif ($item->status == 'aktif')
                                        Aktif
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-info mx-1" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $item->id }}">
                                            <i class="bi bi-file-earmark-text" style="color: white"></i>
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
                            @include('prasarana.editprasarana')
                            @include('prasarana.hapusprasarana')
                            @include('prasarana.detailprasarana')
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    @include('prasarana.tambahprasarana')

@endsection
