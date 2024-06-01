<div class="modal fade" id="tambahPrasaranaModal" tabindex="-1" aria-labelledby="tambahPrasaranaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPrasaranaModalLabel">Tambah Data Prasarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posttambahprasarana') }}" class="form-group" enctype="multipart/form-data" method="POST">
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

{{-- @extends('template.sidebar')
@section('title', 'Tambah Data Prasarana')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="card mx-auto p-5 col-md-5 shadow">
            <h4 class="text-center mb-5 fw-bold">Tambah Data Prasarana</h4>
            <form action="{{ route('posttambahprasarana') }}" class="form-group" enctype="multipart/form-data" method="POST">
                @csrf
                <label for="">Nama</label>
                <input type="text" class="form-control" required name="nama_sarpras">
                <label for="">Foto</label>
                <input type="file" accept="img/sarana/*" class="form-control" required name="foto">
                <label for="">Stok</label>
                <input type="number" class="form-control" required name="stok">
                <label for="">Penerima Barang</label>
                <input type="text" class="form-control" required name="penerima_barang">
                <label for="">Status</label>
                <select name="status" id="" class="form-control" required >
                    <option value="aktif">Aktif</option>
                    <option value="tidak">Tidak Aktif</option>
                </select>
                <button class="btn btn-primary w-100 mt-2">Simpan</button>
            </form>
        </div>
    </div>

@endsection --}}
