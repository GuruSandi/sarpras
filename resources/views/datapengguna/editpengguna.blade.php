<!-- Modal Form Edit -->
<div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" aria-labelledby="editModal{{$item->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{$item->id}}Label">Edit Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit -->
                <form action="{{ route('posteditpengguna', $item->id) }}" class="form-group" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" accept="img/fotopengguna/*" class="form-control" name="foto" id="foto">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" required name="nama" id="nama" value="{{ $item->nama }}">
                    
                    <label for="NIP" class="form-label">NIP</label>
                    <input type="number" class="form-control" required name="NIP" id="NIP" value="{{ $item->NIP }}">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" required name="email" id="email" value="{{ $item->email }}">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" required name="password" id="password"  value="{{ $item->password }}">
                   
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



