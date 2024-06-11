@extends('template.sidebar')
@section('title', 'Sebaran Sarpras')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('filtersebaransarpras') }}" method="GET" enctype="multipart/form-data"
                        class="form-group">
                        @csrf
                        <div class="row mb-5">
                            <div class="col-3">
                                <label for="kode_sarpras" style="font-size: 12px">Kode Sarpras</label>
                                <input type="text" required name="kode_sarpras" class="form-control form-control-sm"
                                    placeholder="Cari berdasarkan kode sarpras">


                            </div>
                            <div class="col-3">
                                <label for="end_date" style="font-size: 14px">Tanggal Mulai</label>
                                <input type="date" required name="tanggal_awal" class="form-control form-control-sm"
                                    placeholder="Tanggal Awal">


                            </div>
                            <div class="col-3">
                                <label for="tanggal_akhir" style="font-size: 14px">Tanggal Akhir</label>
                                <input type="date" required name="tanggal_akhir" class="form-control form-control-sm"
                                    placeholder="Tanggal Akhir">


                            </div>
                            <div class="col-3 mt-4">
                                <button type="submit" name="action" class="btn btn-sm btn-primary" value="search"><i
                                        class="bi bi-search"></i> Cari</button>
                                <button type="submit" name="action" class="btn btn-sm btn-danger" value="download_pdf"><i
                                        class="bi bi-file-pdf"></i> PDF</button>
                                <button type="submit" name="action" class="btn btn-sm btn-success"
                                    value="download_excel"><i class="bi bi-file-excel"></i> Excel</button>
                            </div>
                        </div>

                    </form>
                    

                    <table class="table table-bordered" id="example" style="font-size: 11px">
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
                                        <img src="{{ asset($item->sarpras->foto) }}" alt="" width="100"
                                            height="100">
                                    </td>
                                    <td>
                                        {{ $item->sarpras->nama_sarpras }}
                                    </td>
                                    <td>
                                        {{ $item->jumlah }}
                                    </td>
                                    <td>
                                        @if ($item->status == 'dipinjam')
                                            Dipinjam
                                        @elseif($item->status == 'kembali')
                                            Kembali
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

                </div>
            </div>
        </div>
    </div>

@endsection
