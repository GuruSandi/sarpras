<div class="modal fade" id="ExportModal" tabindex="-1"
    aria-labelledby="ExportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExportModalLabel">Export Data Prasarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Catatan: Jika Anda memilih jenis prasarana, data yang diekspor akan sesuai dengan jenis yang dipilih. Jika tidak memilih jenis prasarana, maka data yang ditampilkan adalah data yang tidak memiliki jenis prasarana.</p>
                <form action="{{ route('exportDataPrasarana') }}" method="post">
                    @csrf
                    <label for="jenis">Jenis Prasarana</label>
                    <select name="jenis_prasarana"  class="form-control">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="gedung">Gedung</option>
                        <option value="laboratorium">Laboratorium</option>
                        <option value="perpustakaan">Perpustakaan</option>
                        <option value="saranaolahraga">Sarana Olahraga</option>
                    </select>
                    <div class="modal-footer">
                        <!-- Form Submission for Deletion -->
        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        
                        <button type="submit" class="btn btn-success"> <i
                            class="bi bi-file-excel"></i> Export Excel</button>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
</div>
