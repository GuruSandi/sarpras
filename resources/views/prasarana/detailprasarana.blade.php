
<!-- Modal Detail Prasarana -->
<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="detailModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal{{ $item->id }}Label">Detail Prasarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display Prasarana Details -->
                <div class="row">
                    <div class="col-6">
                        <h6>Kode Prasarana:</h6>
                        <p>{{ $item->kode_sarpras }}</p>
                        <h6>Jenis Prasarana:</h6>
                        <p>
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
                    </div>
                    <div class="col-6">
                        <h6>Nama Prasarana:</h6>
                        <p>{{ $item->nama_sarpras }}</p>
                        <h6>Kondisi Bangunan:</h6>
                        <p>{{ $item->kondisi_barang }}</p>
                    </div>
                </div>

                @if ($item->jenis_prasarana == 'gedung')
                    <div class="row">
                        <div class="col-6">
                            <h6>Jumlah Lantai:</h6>
                            <p>{{ $item->jumlahruang }}</p>
                        </div>
                        <div class="col-6">
                            <h6>Jumlah Ruang:</h6>
                            <p>{{ $item->jumlah_ruang_kelas }}</p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6>Kapasitas Listrik:</h6>
                            <p>{{ $item->fasilitasruang }}</p>
                        </div>
                        <div class="col-6">
                            <h6>Sanitasi:</h6>
                            <p>{{ $item->sanitasi }}</p>
                        </div>
                    </div>
                @elseif($item->jenis_prasarana == 'laboratorium')
                    <div class="row">
                        <div class="col-6">
                            <h6>Jenis Laboratorium:</h6>
                            <p>{{ $item->jenis_laboratorium }}</p>
                        </div>
                        <div class="col-6">
                            <h6>Peralatan yang Tersedia:</h6>
                            <p>{{ $item->peralatan_tersedia }}</p>
                        </div>
                    </div>
                @elseif($item->jenis_prasarana == 'perpustakaan')
                    <div class="row">
                        <div class="col-6">
                            <h6>Jumlah Buku:</h6>
                            <p>{{ $item->jumlah }}</p>
                            <h6>Jenis Koleksi:</h6>
                            <p>{{ $item->jenis_koleksi }}</p>
                        </div>
                        <div class="col-6">
                            <h6>Fasilitas Komputer:</h6>
                            <p>{{ $item->fasilitas }}</p>
                            <h6>Luas Ruang Baca:</h6>
                            <p>{{ $item->luas_ruang }} m²</p>
                        </div>
                    </div>
                @elseif($item->jenis_prasarana == 'saranaolahraga')
                    <div class="row">
                        <div class="col-4">
                            <h6>Jenis Lapangan:</h6>
                            <p>{{ $item->jenis_ruangan }}</p>
                        </div>
                        <div class="col-4">
                            <h6>Ukuran Lapangan:</h6>
                            <p>{{ $item->ukuran_lapangan }}</p>
                        </div>
                        <div class="col-4">
                            <h6>Kondisi Lapangan:</h6>
                            <p>{{ $item->kondisi_lapangan }}</p>
                        </div>
                    </div>
                @endif

                @if (empty($item->jenis_prasarana) || is_null($item->jenis_prasarana))
                    <div class="row">
                        <div class="col-4">
                            <h6>Fungsi Prasarana:</h6>
                            <p>{{ $item->fungsi_prasarana ?? 'Tidak Diketahui' }}</p>

                        </div>
                        <div class="col-4">
                            <h6>Status Penggunaan:</h6>
                            <p>
                                @if ($item->status == 'tidak')
                                    Tidak Aktif
                                @elseif ($item->status == 'aktif')
                                    Aktif
                                @elseif ($item->status == 'diperbaiki')
                                    Sedang diperbaiki
                                @endif
                            </p>
                        </div>
                        <div class="col-4">
                            <h6>Kapasitas Penggunaan:</h6>
                            <p>{{ $item->kapasitas_penggunaan ?? 'Tidak Diketahui' }}</p>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-6">
                        <h6>Tahun Pembangunan:</h6>
                        <p>{{ $item->tahun_pembangunan }}</p>
                    </div>
                    <div class="col-6">
                        <h6>Sumber Dana:</h6>
                        <p>{{ $item->sumber_dana }}</p>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-6">
                        <h6>Luas Bangunan:</h6>
                        <p>{{ $item->luas_bangunan }} m²</p>
                    </div>
                    <div class="col-6">
                        <h6>Foto:</h6>
                        <img src="{{ asset($item->foto) }}" width="100" height="100" alt="Foto Prasarana">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
