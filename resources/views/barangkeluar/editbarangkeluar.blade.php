@extends('template.sidebar')
@section('title', 'Edit Barang Keluar')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalPilihBarang">
                            Pilih Barang Baru
                        </button>

                        <table class="table" id="tabelbarangkeluar">
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
                                    <td>{{ $barangkeluar->sarpras->kode_sarpras }}</td>
                                    <td>{{ $barangkeluar->sarpras->nama_sarpras }}</td>
                                    <td>
                                        <img src="{{ asset($barangkeluar->sarpras->foto) }}" alt="" width="100"
                                            height="100">
                                    </td>
                                    <td>{{ $barangkeluar->sarpras->stok }}</td>

                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('updatebarangkeluar', $barangkeluar->id) }}" class="form-group"
                            enctype="multipart/form-data" method="POST">
                            @csrf

                            <input type="hidden" id="barang_id_input" name="sarpras_id" value="{{ $barangkeluar->sarpras->id }}">


                            <label for="tanggal_keluar" class="form-label">Tanggal keluar</label>
                            <?php $tanggal_keluar_formatted = date("Y-m-d", strtotime($barangkeluar->tanggal_keluar)); ?>
                            <input type="date" class="form-control" required name="tanggal_keluar"
                                value="{{ $tanggal_keluar_formatted }}">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" required name="jumlah"
                                value="{{ $barangkeluar->jumlah }}">
                            <label for="penerima" class="form-label">Penerima</label>
                            <input type="text" class="form-control" required name="penerima"
                                value="{{ $barangkeluar->penerima }}">


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('barangkeluar.pilihbarangbaru')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Script untuk menyimpan daftar barang yang dipilih -->
    {{-- <script>
        $(document).ready(function(){
            $('.pilih-barang').click(function(){
                var barang_id = $(this).data('id'); // Mengambil ID barang dari atribut data
                $('#barang_id_input').val(barang_id); // Mengisi nilai input tersembunyi dengan ID barang yang dipilih
            });
        });
    </script> --}}
    <script>
        $(document).ready(function(){
            $('.pilih-barang').click(function(){
                var barang_id = $(this).data('id'); // Mengambil ID barang dari atribut data
                $('#barang_id_input').val(barang_id); // Mengisi nilai input tersembunyi dengan ID barang yang dipilih
                
                // Perbarui konten tabel dengan barang yang dipilih
                var kode_barang = $(this).closest('tr').find('td:eq(1)').text(); // Ambil kode barang dari baris yang dipilih
                var nama_barang = $(this).closest('tr').find('td:eq(2)').text(); // Ambil nama barang dari baris yang dipilih
                var foto_barang = $(this).closest('tr').find('td:eq(3) img').attr('src'); // Ambil foto barang dari baris yang dipilih
                var stok_barang = $(this).closest('tr').find('td:eq(4)').text(); // Ambil stok barang dari baris yang dipilih
    
                // Ubah isi dari tabel dengan barang yang dipilih
                $('#tabelbarangkeluar tbody').html(`
                    <tr>
                        <td>${kode_barang}</td>
                        <td>${nama_barang}</td>
                        <td><img src="${foto_barang}" alt="" width="100" height="100"></td>
                        <td>${stok_barang}</td>
                    </tr>
                `);
            });
        });
    </script>
    
    


@endsection
