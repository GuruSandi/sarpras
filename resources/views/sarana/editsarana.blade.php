<!-- Modal Form Edit -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModal{{ $item->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $item->id }}Label">Edit Data Sarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit -->
                <form action="{{ route('posteditsarana', $item->id) }}" class="form-group" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Kategori Barang</label>
                            <select name="kategori_id" required id="kategori_id" class="form-control">
                                @foreach ($data as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        @if ($kategori->id == $item->kategori_id) selected @endif>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach

                            </select>
                            <label for="nama_sarpras" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" required name="nama_sarpras" id="nama_sarpras"
                                value="{{ $item->nama_sarpras }}">
                            <label for="spesifikasi_barang" class="form-label">Spesifikasi Barang</label>
                            <input type="text" class="form-control" required name="spesifikasi_barang"
                                id="spesifikasi_barang" value="{{ $item->spesifikasi_barang }}">
                            <label for="stok" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" required name="stok" id="stok"
                                value="{{ $item->stok }}">
                        </div>
                        <div class="col-6">
                            
                            <label for="kondisi_barang" class="form-label">Kondisi Barang</label>
                            <input type="text" class="form-control" required name="kondisi_barang"
                                value="{{ $item->kondisi_barang }}">
                            <label for="merk_barang" class="form-label">Merk Barang</label>
                            <input type="text" class="form-control" required name="merk_barang"
                                value="{{ $item->merk_barang }}">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" accept="image/*" class="form-control" name="foto" id="foto">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="aktif" @if ($item->status == 'aktif') selected @endif>Aktif</option>
                                <option value="tidak" @if ($item->status == 'tidak') selected @endif>Tidak Aktif
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
