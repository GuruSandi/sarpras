<div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="hapusModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModal{{ $item->id }}Label">Hapus Data Prasarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Confirmation Message -->
                <p>Apakah Anda yakin ingin menghapus {{ $item->nama_sarpras }}?</p>
            </div>
            <div class="modal-footer">
                <!-- Form Submission for Deletion -->

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                <a href="{{ route('hapusprasarana', $item->id) }}" class="btn btn-danger">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>
