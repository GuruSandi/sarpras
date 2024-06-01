<div class="modal fade" id="modalPilihBarang" tabindex="-1" aria-labelledby="modalPilihBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPilihBarangLabel">Pilih Barang Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table tabel-sm table-bordered" id="example" style="font-size: 10px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Foto</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangBaru as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $barang->kode_sarpras }}</td>
                                <td>{{ $barang->nama_sarpras }}</td>
                                <td>
                                    <img src="{{ asset($barang->foto) }}" alt="" width="60" height="60">
                                </td>
                                <td>{{ $barang->stok }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary pilih-barang" data-id="{{ $barang->id }}" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
