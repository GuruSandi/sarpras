<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="detailModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal{{ $item->id }}Label">Detail Barang Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display Details -->
                <p><strong>Kode Barang:</strong> {{ $item->sarpras->kode_sarpras }}</p>
                <p><strong>Nama Barang:</strong> {{ $item->sarpras->nama_sarpras }}</p>
                <p><strong>Tanggal keluar:</strong> {{ $item->tanggal_keluar}}</p>

                <p><strong>Jumlah:</strong> {{ $item->jumlah }}</p>
                <p><strong>Penerima:</strong> {{ $item->penerima }}</p>
                <p><strong>Status:</strong> {{ $item->status }}</p>
                <p><strong>Foto:</strong> <img src="{{ asset($item->sarpras->foto) }}" alt="Foto Sarana"
                        width="100" height="100"></p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


