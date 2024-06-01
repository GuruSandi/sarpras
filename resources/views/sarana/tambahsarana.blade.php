<div class="modal fade" id="tambahSaranaModal" tabindex="-1" aria-labelledby="tambahSaranaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSaranaModalLabel">Tambah Data Sarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posttambahsarana') }}" class="form-group" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="nama_sarpras" class="form-label">Nama</label>
                    <input type="text" class="form-control" required name="nama_sarpras" id="nama_sarpras">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" accept="image/*" class="form-control" required name="foto" id="foto">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" required name="stok" id="stok">
                    <label for="penerima_barang" class="form-label">Penerima Barang</label>
                    <input type="text" class="form-control" required name="penerima_barang" id="penerima_barang">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="aktif">Aktif</option>
                        <option value="tidak">Tidak Aktif</option>
                    </select>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>