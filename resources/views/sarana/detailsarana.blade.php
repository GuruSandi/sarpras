<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="detailModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal{{ $item->id }}Label">Detail Sarana</h5>
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


