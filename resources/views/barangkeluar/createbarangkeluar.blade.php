@extends('template.sidebar')
@section('title', 'Input Barang Keluar')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-6">
                        @if (Session::has('status'))
                            <div class="pesan pesan-danger d-flex justify-content-between align-items-center position-fixed top-0 end-0"
                                style="font-size: 14px; z-index: 1050; width: 530px;">
                                <div class="mr-auto" style="font-weight: bold"> <i class="bi bi-exclamation-circle"
                                        style="margin-right: 2px"></i> Error: {{ Session::get('status') }}
                                </div>
                                <!-- mr-auto untuk memberikan margin kanan otomatis agar teks sejajar dengan tombol close -->
                                <button type="button" class="close-danger ml-2" data-dismiss="pesan" aria-label="Close">
                                    <!-- ml-2 untuk memberikan margin kiri -->
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#pilihbarang">
                            <i class="bi bi-plus-circle"></i> Ganti Barang
                        </button>
                        <p>Barang yang Dipilih</p>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $barang->kode_sarpras }}</td>
                                    <td>{{ $barang->nama_sarpras }}</td>
                                    <td>
                                        <img src="{{ asset($barang->foto) }}" alt="" width="100" height="100">
                                    </td>
                                    <td>{{ $barang->stok }}</td>
                                </tr>

                            </tbody>
                        </table>

                        <form action="{{ route('createbarangkeluar') }}" class="form-group" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            <input type="hidden" name="sarpras_id" value="{{ $barang->id }}" required>
                            <label for="tanggal_keluar" class="form-label">Tanggal keluar</label>
                            <input type="date" class="form-control" required name="tanggal_keluar" id="tanggal_keluar">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" required name="jumlah">
                            <label for="penerima" class="form-label">Penerima</label>
                            <input type="text" class="form-control" required name="penerima">

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('barangkeluar.pilihbarang')

    <script>
        // Dapatkan elemen input berdasarkan id
        var inputTanggalKeluar = document.getElementById('tanggal_keluar');

        // Buat objek Date untuk mendapatkan tanggal dan waktu saat ini
        var sekarang = new Date();

        // Buat string dengan format YYYY-MM-DD, yang diperlukan oleh input date
        var tahun = sekarang.getFullYear();
        var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0'); // tambahkan 0 jika kurang dari 10
        var tanggal = sekarang.getDate().toString().padStart(2, '0'); // tambahkan 0 jika kurang dari 10

        // Set nilai default input
        inputTanggalKeluar.value = tahun + '-' + bulan + '-' + tanggal;
    </script>

@endsection
