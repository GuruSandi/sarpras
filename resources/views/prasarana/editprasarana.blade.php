
<!-- Modal Form Edit -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModal{{ $item->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $item->id }}Label">Edit Data Prasarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit -->
                <form action="{{ route('posteditprasarana', $item->id) }}" class="form-group"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="kode_prasarana" class="form-label">Kode Prasarana</label>
                            <input type="text" readonly class="form-control" required name="kode_sarpras"
                                value="{{ $item->kode_sarpras }}" id="kode_sarpras">
                        </div>
                        <div class="col-6">
                            <label for="nama_sarpras" class="form-label">Nama Prasarana</label>
                            <input type="text" class="form-control" required name="nama_sarpras" id="nama_sarpras"
                                value="{{ $item->nama_sarpras }}">
                        </div>
                    </div>
                    <label for="jenis_prasarana" class="form-label">Jenis Prasarana:</label>
                    <p id="jenis_prasarana_edit">
                        @if ($item->jenis_prasarana == 'gedung')
                            Gedung
                        @elseif($item->jenis_prasarana == 'laboratorium')
                            Laboratorium
                        @elseif($item->jenis_prasarana == 'perpustakaan')
                            Perpustakaan
                        @elseif($item->jenis_prasarana == 'saranaolahraga')
                            Sarana Olahraga
                        @else
                            Tidak dipilih
                        @endif
                    </p>
                    

                    <!-- Conditional Fields -->
                    <div class="form-group" id="atribut-gedung-edit"
                        style="{{ $item->jenis_prasarana == 'gedung' ? 'display: block;' : 'display: none;' }}">
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="jumlah">Jumlah Lantai</label>
                                <input type="number" name="jumlahruang" class="form-control"
                                    value="{{ $item->jumlahruang }}">
                            </div>
                            <div class="col-6">
                                <label for="jumlah_ruang_kelas">Jumlah Ruang</label>
                                <input type="number" name="jumlah_ruang_kelas" class="form-control"
                                    value="{{ $item->jumlah_ruang_kelas }}">
                            </div>
                           
                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="fasilitasruang">Kapasitas Listrik</label>
                                <input type="number" name="fasilitasruang" class="form-control"
                                    value="{{ $item->fasilitasruang }}">
                            </div>
                            <div class="col-6">
                                <label for="sanitasi">Sanitasi</label>
                                <input type="text" name="sanitasi" class="form-control"
                                    value="{{ $item->sanitasi }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="atribut-laboratorium-edit"
                        style="{{ $item->jenis_prasarana == 'laboratorium' ? 'display: block;' : 'display: none;' }}">
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="jenis_laboratorium">Jenis Laboratorium</label>
                                <select name="jenis_laboratorium" class="form-control">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="IPA" {{ $item->jenis_laboratorium == 'IPA' ? 'selected' : '' }}>
                                        IPA</option>
                                    <option value="Bahasa"
                                        {{ $item->jenis_laboratorium == 'Bahasa' ? 'selected' : '' }}>Bahasa</option>
                                    <option value="Komputer"
                                        {{ $item->jenis_laboratorium == 'Komputer' ? 'selected' : '' }}>Komputer
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="peralatan_tersedia">Peralatan yang tersedia</label>
                                <input type="text" name="peralatan_tersedia" class="form-control"
                                    value="{{ $item->peralatan_tersedia }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="atribut-perpustakaan-edit"
                        style="{{ $item->jenis_prasarana == 'perpustakaan' ? 'display: block;' : 'display: none;' }}">
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="jumlah">Jumlah Buku</label>
                                <input type="number" name="jumlah" class="form-control"
                                    value="{{ $item->jumlah }}">
                                <label for="fasilitas">Fasilitas Komputer</label>
                                <input type="text" name="fasilitas" class="form-control"
                                    value="{{ $item->fasilitas }}">
                            </div>
                            <div class="col-6">
                                <label for="jenis_koleksi">Jenis Koleksi</label>
                                <input type="text" name="jenis_koleksi" class="form-control"
                                    value="{{ $item->jenis_koleksi }}">
                                <label for="luas_ruang">Luas Ruang Baca</label>
                                <input type="number" name="luas_ruang" class="form-control"
                                    value="{{ $item->luas_ruang }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="atribut-sarana-olahraga-edit"
                        style="{{ $item->jenis_prasarana == 'saranaolahraga' ? 'display: block;' : 'display: none;' }}">
                        <div class="row mt-1">
                            <div class="col-4">
                                <label for="jenis_ruangan">Jenis Lapangan</label>
                                <select name="jenis_ruangan" class="form-control">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Baket" {{ $item->jenis_ruangan == 'Baket' ? 'selected' : '' }}>
                                        Baket</option>
                                    <option value="Sepak Bola"
                                        {{ $item->jenis_ruangan == 'Sepak Bola' ? 'selected' : '' }}>Sepak Bola
                                    </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="ukuran_lapangan">Ukuran Lapangan</label>
                                <input type="text" name="ukuran_lapangan" class="form-control"
                                    value="{{ $item->ukuran_lapangan }}">
                            </div>
                            <div class="col-4">
                                <label for="kondisi_lapangan">Kondisi Lapangan</label>
                                <input type="text" name="kondisi_lapangan" class="form-control"
                                    value="{{ $item->kondisi_lapangan }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6">
                            <label for="kondisi_barang" class="form-label">Kondisi Bangunan</label>
                            <input type="text" class="form-control" required name="kondisi_barang"
                                value="{{ $item->kondisi_barang }}">
                            <label for="tahun_pembangunan" class="form-label">Tahun Pembangunan</label>
                            <input type="number" class="form-control" required name="tahun_pembangunan"
                                value="{{ $item->tahun_pembangunan }}">
                            <label for="sumber_dana" class="form-label">Sumber Dana</label>
                            <input type="text" class="form-control" required name="sumber_dana"
                                value="{{ $item->sumber_dana }}">
                        </div>
                        <div class="col-6">
                            <label for="luas_bangunan" class="form-label">Luas Bangunan</label>
                            <input type="number" class="form-control" required name="luas_bangunan"
                                value="{{ $item->luas_bangunan }}">
                            
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" accept="image/*" class="form-control" name="foto"
                                id="foto">
                        </div>
                    </div>
                    <div class="form-group" id="atribut-penggunaan-edit"
                        style="{{ $item->jenis_prasarana ? 'display: none;' : 'display: block;' }}">
                        <div class="row mt-1">
                            <div class="col-4">
                                <label for="fungsi_prasarana">Fungsi Prasarana</label>
                                <input type="text" name="fungsi_prasarana" id="fungsi_prasarana"
                                    class="form-control" value="{{ $item->fungsi_prasarana }}">
                            </div>
                            <div class="col-4">
                                <label for="status">Status Penggunaan</label>
                                <select name="status" class="form-control">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="aktif" {{ $item->status == 'aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="tidak" {{ $item->status == 'tidak' ? 'selected' : '' }}>Tidak
                                        Aktif</option>
                                    <option value="diperbaiki" {{ $item->status == 'diperbaiki' ? 'selected' : '' }}>
                                        Sedang diperbaiki</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="kapasitas_penggunaan">Kapasitas Penggunaan</label>
                                <input type="text" name="kapasitas_penggunaan" class="form-control"
                                    value="{{ $item->kapasitas_penggunaan }}">
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jenisPrasaranaEdit = document.getElementById('jenis_prasarana_edit');
        const atributGedung = document.getElementById('atribut-gedung-edit');
        const atributLaboratorium = document.getElementById('atribut-laboratorium-edit');
        const atributPerpustakaan = document.getElementById('atribut-perpustakaan-edit');
        const atributSaranaOlahraga = document.getElementById('atribut-sarana-olahraga-edit');
        const atributPenggunaan = document.getElementById('atribut-penggunaan-edit');

        jenisPrasaranaEdit.addEventListener('change', function() {
            const selectedValue = this.value;

            // Hide all attributes
            atributGedung.style.display = 'none';
            atributLaboratorium.style.display = 'none';
            atributPerpustakaan.style.display = 'none';
            atributSaranaOlahraga.style.display = 'none';
            atributPenggunaan.style.display = 'none';

            // Show relevant attributes
            if (selectedValue === 'gedung') {
                atributGedung.style.display = 'block';
            } else if (selectedValue === 'laboratorium') {
                atributLaboratorium.style.display = 'block';
            } else if (selectedValue === 'perpustakaan') {
                atributPerpustakaan.style.display = 'block';
            } else if (selectedValue === 'saranaolahraga') {
                atributSaranaOlahraga.style.display = 'block';
            } else {
                atributPenggunaan.style.display = 'block';
            }
        });
    });
</script>
