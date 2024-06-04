<div class="modal fade" id="tambahPenggunaModal" tabindex="-1" aria-labelledby="tambahPenggunaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenggunaModalLabel">Tambah Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posttambahpengguna') }}" class="form-group" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" accept="image/*" class="form-control" required name="foto" id="foto">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" required name="nama" id="nama">
                    <label for="NIP" class="form-label">NIP</label>
                    <input type="text" class="form-control" required name="NIP" id="NIP">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" required name="email" id="email">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" required name="password" id="password">
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>