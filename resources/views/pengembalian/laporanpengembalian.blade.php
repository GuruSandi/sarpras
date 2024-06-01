@extends('template.sidebar')
@section('title', 'Laporan Pengembalian')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('filterkembali') }}" method="GET" enctype="multipart/form-data" class="form-group">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-4">
                                    <label for="start_date" style="font-size: 14px">Start Date</label>
                                    <input type="date" name="start_date" class="form-control form-control-sm" required>

                                </div>
                                <div class="col-4">
                                    <label for="end_date" style="font-size: 14px">End Date</label>
                                    <input type="date" name="end_date" class="form-control form-control-sm" required>

                                </div>
                                <div class="col-4 mt-4">
                                    <button type="submit" name="action" class="btn btn-sm btn-primary" value="search"><i
                                            class="bi bi-search"></i> Cari</button>
                                    <button type="submit" name="action" class="btn btn-sm btn-danger"
                                        value="download_pdf"><i class="bi bi-file-pdf"></i> Cetak PDF</button>
                                    <button type="submit" name="action" class="btn btn-sm btn-success"
                                        value="download_excel"><i class="bi bi-file-excel"></i> Export Excel</button>
                                </div>
                            </div>

                        </form>
                        
                        <table class="table tabel-bordered tabel-sm" id="example" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Sarpras</th>
                                    <th>Kondisi Pinjam</th>
                                    <th>Jumlah</th>
                                    <th>Peminjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengembalian as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $item->tanggal_pinjam }}</td>
                                        <td>{{ $item->tanggal_kembali }}</td>
                                        <td>{{ $item->sarpras->kode_sarpras }}</td>
                                        <td>{{ $item->sarpras->nama_sarpras }}</td>
                                        <td>{{ $item->kondisi_pinjam }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->peminjam }}</td>
                                        <td>{{ $item->status }}</td>

                                        
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
