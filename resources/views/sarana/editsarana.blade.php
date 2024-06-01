<!-- Modal Form Edit -->
<div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" aria-labelledby="editModal{{$item->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{$item->id}}Label">Edit Data Sarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit -->
                <form action="{{ route('posteditsarana', $item->id) }}" class="form-group" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="nama_sarpras" class="form-label">Nama</label>
                    <input type="text" class="form-control" required name="nama_sarpras" id="nama_sarpras" value="{{ $item->nama_sarpras }}">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" accept="image/*" class="form-control" name="foto" id="foto">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" required name="stok" id="stok" value="{{ $item->stok }}">
                    <label for="penerima_barang" class="form-label">Penerima Barang</label>
                    <input type="text" class="form-control" required name="penerima_barang" id="penerima_barang" value="{{ $item->penerima_barang }}">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="aktif" @if ($item->status == 'aktif') selected @endif>Aktif</option>
                        <option value="tidak" @if ($item->status == 'tidak') selected @endif>Tidak Aktif</option>
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



