<div class="modal fade" id="tambahPrasaranaModal" tabindex="-1" aria-labelledby="tambahPrasaranaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPrasaranaModalLabel">Tambah Data Prasarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posttambahprasarana') }}" class="form-group" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="kode_prasarana" class="form-label">Kode Prasarana</label>
                            <input type="text" readonly class="form-control" required name="kode_sarpras"
                                value="{{ $kode }}" id="kode_sarpras">
                        </div>
                        <div class="col-6">
                            <label for="nama_sarpras" class="form-label">Nama Prasarana</label>
                            <input type="text" class="form-control" required name="nama_sarpras" id="nama_sarpras">
                        </div>
                    </div>
                    <label for="jenis">Jenis Prasarana</label>
                    <select name="jenis_prasarana" id="jenis_prasarana" class="form-control">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="gedung">Gedung</option>
                        <option value="laboratorium">Laboratorium</option>
                        <option value="perpustakaan">Perpustakaan</option>
                        <option value="saranaolahraga">Sarana Olahraga</option>
                    </select>

                    <div class="form-group" id="atribut-gedung" style="display: none;">
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="jumlah">Jumlah Lantai</label>
                                <input type="number" name="jumlahruang" class="form-control">
                                
                            </div>
                            <div class="col-6">
                                <label for="jumlah_ruang_kelas">Jumlah Ruang</label>
                                <input type="number" name="jumlah_ruang_kelas" class="form-control">
                            </div>
                            
                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="fasilitasruang">Kapasitas Listrik</label>
                                <input type="number" name="fasilitasruang" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="sanitasi">Sanitasi</label>
                                <input type="text" name="sanitasi" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="atribut-laboratorium" style="display: none;">
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="jenis_ruangan">Jenis Laboratorium</label>
                                {{-- <input type="text" name="jenis_ruangan" class="form-control"> --}}
                                
                                <select name="jenis_laboratorium" class="form-control">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="IPA">IPA</option>
                                    <option value="Bahasa">Bahasa</option>
                                    <option value="Komputer" >Komputer</option>
                                </select>
                                
                            </div>
                            <div class="col-6">
                                <label for="peralatan_tersedia">Peralatan yang tersedia</label>
                                <input type="text" name="peralatan_tersedia" id="peralatan_tersedia"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="atribut-perpustakaan" style="display: none;">
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="jumlah">Jumlah Buku</label>
                                <input type="number" name="jumlah" class="form-control">
                                <label for="fasilitas">Fasilitas Komputer</label>
                                <input type="text" name="fasilitas" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="jenis_koleksi">Jenis Koleksi</label>
                                <input type="text" name="jenis_koleksi" class="form-control">
                                <label for="luas_ruang">Luas Ruang Baca</label>
                                <input type="number" name="luas_ruang" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="atribut-sarana-olahraga" style="display: none;">
                        <div class="row mt-1">
                            <div class="col-4">
                                <label for="jenis_ruangan">Jenis Lapangan</label>
                                <select name="jenis_ruangan" class="form-control">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Baket">Baket</option>
                                    <option value="Sepak Bola">Sepak Bola</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="ukuran_lapangan">Ukuran Lapangan</label>
                                <input type="text" name="ukuran_lapangan" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="kondisi_lapangan">Kondisi Lapangan</label>
                                <input type="text" name="kondisi_lapangan" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6">
                            <label for="kondisi_barang" class="form-label">Kondisi Bangunan</label>
                            <input type="text" class="form-control" required name="kondisi_barang">
                            <label for="tahun_pembangunan" class="form-label">Tahun Pembangunan</label>
                            <input type="number" class="form-control" required name="tahun_pembangunan">
                            <label for="sumber_dana" class="form-label">Sumber Dana</label>
                            <input type="text" class="form-control" required name="sumber_dana">
                        </div>
                        <div class="col-6">
                            <label for="luas_bangunan" class="form-label">Luas Bangunan</label>
                            <input type="number" class="form-control" required name="luas_bangunan">
                            <input type="hidden" class="form-control" required name="jenis_sarpras" value="prasarana">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" accept="image/*" class="form-control" required name="foto"
                                id="foto">
                        </div>
                    </div>
                    <div class="form-group" id="atribut-penggunaan">
                        <div class="row mt-1">
                            <div class="col-4">
                                <label for="fungsi_prasarana">Fungsi Prasarana</label>
                                <input type="text" name="fungsi_prasarana" id="fungsi_prasarana"
                                    class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="status">Status Penggunaan</label>
                                <select name="status" class="form-control">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak">Tidak Aktif</option>
                                    <option value="diperbaiki">Sedang diperbaiki</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="kapasitas_penggunaan">Kapasitas Penggunaan</label>
                                <input type="text" name="kapasitas_penggunaan" class="form-control">
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
        const jenisPrasarana = document.getElementById('jenis_prasarana');
        const atributGedung = document.getElementById('atribut-gedung');
        const atributLaboratorium = document.getElementById('atribut-laboratorium');
        const atributPerpustakaan = document.getElementById('atribut-perpustakaan');
        const atributSaranaOlahraga = document.getElementById('atribut-sarana-olahraga');
        const atributPenggunaan = document.getElementById('atribut-penggunaan');

        jenisPrasarana.addEventListener('change', function() {
            const selectedValue = this.value;

            // Hide all attributes
            atributGedung.style.display = 'none';
            atributLaboratorium.style.display = 'none';
            atributPerpustakaan.style.display = 'none';
            atributSaranaOlahraga.style.display = 'none';

            // Show relevant attributes
            if (selectedValue === 'gedung') {
                atributGedung.style.display = 'block';
                atributPenggunaan.style.display = 'none';
            } else if (selectedValue === 'laboratorium') {
                atributLaboratorium.style.display = 'block';
                atributPenggunaan.style.display = 'none';
            } else if (selectedValue === 'perpustakaan') {
                atributPerpustakaan.style.display = 'block';
                atributPenggunaan.style.display = 'none';
            } else if (selectedValue === 'saranaolahraga') {
                atributSaranaOlahraga.style.display = 'block';
                atributPenggunaan.style.display = 'none';
            } else {
                atributPenggunaan.style.display = 'block';
            }
        });
    });
</script>
