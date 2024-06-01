<div class="modal fade" id="pilihbarang" tabindex="-1" aria-labelledby="pilihbarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihbarangLabel">Data Sarana Prasarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table tabel-sm table-bordered" id="example" style="font-size: 10px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sarpras as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_sarpras }}</td>
                                <td>{{ $item->nama_sarpras }}</td>
                                <td>
                                    <img src="{{ asset($item->foto) }}" alt="" width="60" height="60">
                                </td>
                                <td>{{ $item->stok }}</td>
                                
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('pilihbarangkeluar', $item->id) }}" class="btn btn-sm btn-primary">pilih</a>
                                    </div>
                                </td>
                            </tr>
                            
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>