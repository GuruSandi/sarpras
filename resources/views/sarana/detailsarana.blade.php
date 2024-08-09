<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="detailModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal{{ $item->id }}Label">Detail Sarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display Details -->
                <div class="row p-3">
                    <div class="col-6">
                        <p><strong>Kategori Barang:</strong> {{ $item->kategori->nama }}</p>
                        <p><strong>Nama:</strong> {{ $item->nama_sarpras }}</p>
                        <p><strong>Spesifikasi Barang:</strong> {{ $item->spesifikasi_barang }}</p>
                        <p><strong>Jumlah Barang:</strong> {{ $item->stok }}</p>
                        <p><strong>Foto:</strong> <img src="{{ asset($item->foto) }}" alt="Foto Sarana" width="100"
                            height="100"></p>
                    </div>
                    <div class="col-6">
                        <p><strong>Kode Barang:</strong> {{ $item->kode_sarpras }}</p>
                        <p><strong>Merk Barang:</strong> {{ $item->merk_barang }}</p>
                        <p><strong>Kondisi Barang:</strong> {{ $item->kondisi_barang }}</p>
                       
                        <p><strong>Status:</strong>
                            @if ($item->status == 'tidak')
                                Tidak Aktif
                            @elseif ($item->status == 'aktif')
                                Aktif
                            @endif
                        </p>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
