<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="detailModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal{{ $item->id }}Label">Detail Prasarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display Details -->
                <p><strong>Nama:</strong> {{ $item->nama_sarpras }}</p>
                <p><strong>Foto:</strong> <img src="{{ asset($item->foto) }}" alt="Foto Sarana"
                        width="100" height="100"></p>
                <p><strong>Stok:</strong> {{ $item->stok }}</p>
                <p><strong>Penerima Barang:</strong> {{ $item->penerima_barang }}</p>
                <p><strong>Status:</strong>
                    @if ($item->status == 'tidak')
                        Tidak Aktif
                    @elseif ($item->status == 'aktif')
                        Aktif
                    @endif
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


{{-- @extends('template.sidebar')
@section('title', 'Detail Data Prasarana')

@section('content')

    <table class="table ">
        <thead>
            <tr>
                <th class="mb-3 p-3 text-white" style="background-color: #0f163c">Detail Sarana</th>
                <th class="mb-3 p-3 text-white" style="background-color: #0f163c">

                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="mb-3 p-3">Kode Barang</td>
                <td class="mb-3 p-3">{{ $sarpras->kode_sarpras }}</td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Nama</td>
                <td class="mb-3 p-3">{{ $sarpras->nama_sarpras }}</td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Foto</td>
                <td class="mb-3 p-3">
                    <img src="{{ asset($sarpras->foto) }}" alt="" width="100" height="100">
                </td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Stok</td>
                <td class="mb-3 p-3">{{ $sarpras->stok }}</td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Penerima Barang</td>
                <td class="mb-3 p-3">{{ $sarpras->penerima_barang }}</td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Status</td>
                <td class="mb-3 p-3">
                    @if ($sarpras->status == 'tidak')
                        Tidak Aktif
                    @elseif ($sarpras->status == 'aktif')
                        Aktif
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

@endsection --}}




{{-- @extends('template.sidebar')
@section('title', 'Detail Data Prasarana')

@section('content')

    <table class="table ">
        <thead>
            <tr>
                <th class="mb-3 p-3 text-white" style="background-color: #0f163c">Detail Prasarana</th>
                <th class="mb-3 p-3 text-white" style="background-color: #0f163c">

                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="mb-3 p-3">Kode Barang</td>
                <td class="mb-3 p-3">{{ $sarpras->kode_sarpras }}</td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Nama</td>
                <td class="mb-3 p-3">{{ $sarpras->nama_sarpras }}</td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Foto</td>
                <td class="mb-3 p-3">
                    <img src="{{ asset($sarpras->foto) }}" alt="" width="100" height="100">
                </td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Stok</td>
                <td class="mb-3 p-3">{{ $sarpras->stok }}</td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Penerima Barang</td>
                <td class="mb-3 p-3">{{ $sarpras->penerima_barang }}</td>
            </tr>
            <tr>
                <td class="mb-3 p-3">Status</td>
                <td class="mb-3 p-3">
                    @if ($sarpras->status == 'tidak')
                        Tidak Aktif
                    @elseif ($sarpras->status == 'aktif')
                        Aktif
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

@endsection --}}
