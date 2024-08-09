<div class="modal fade" id="tambahSaranaModal" tabindex="-1" aria-labelledby="tambahSaranaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSaranaModalLabel">Tambah Data Sarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posttambahsarana') }}" class="form-group" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="status" class="form-label">Kategori Barang</label>
                            <select name="kategori_id" id="kategori_id" class="form-control" required>
                                @foreach ($data as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            <label for="nama_sarpras" class="form-label mt-3">Nama Barang</label>
                            <input type="text" class="form-control" required name="nama_sarpras" id="nama_sarpras">
                            <label for="spesifikasi_barang" class="form-label mt-3">Spesifikasi Barang</label>
                            <input type="text" class="form-control" required name="spesifikasi_barang"
                                id="spesifikasi_barang">
                            <label for="stok" class="form-label mt-3">Jumlah Barang</label>
                            <input type="number" class="form-control" required name="stok" id="stok">
                        </div>
                        <div class="col-6">
                            <label for="kode_sarpras" class="form-label">Kode Barang</label>
                            <input type="text" readonly class="form-control" required name="kode_sarpras"
                                value="{{ $kode }}" id="kode_sarpras">
                            <label for="merk_barang" class="form-label mt-3">Merk Barang</label>
                            <input type="text" class="form-control" required name="merk_barang" id="merk_barang">
                            <label for="kondisi_barang" class="form-label mt-3">Kondisi Barang</label>
                            <input type="text" class="form-control" required name="kondisi_barang"
                                id="kondisi_barang">
                            <label for="foto" class="form-label mt-3">Foto</label>
                            <input type="file" accept="image/*" class="form-control" required name="foto"
                                id="foto">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
