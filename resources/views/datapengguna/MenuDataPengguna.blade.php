@extends('template.sidebar')
@section('title', 'Menu Data Pengguna')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-5">
                @if (Session::has('status'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <strong class="mr-auto">Success: {{ Session::get('status') }}</strong>
                        <!-- mr-auto untuk memberikan margin kanan otomatis agar teks sejajar dengan tombol close -->
                        <button type="button" class="close ml-2" data-dismiss="alert" aria-label="Close">
                            <!-- ml-2 untuk memberikan margin kiri -->
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#tambahPenggunaModal">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </button>
                        <table class="table table-bordered" id="example" style="font-size: 10px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapengguna as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($item->foto) }}" alt="" width="100" height="100">
                                        </td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->NIP }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
                                       
                                        
                                        <td>
                                            <div class="btn-group">
        
                                                <button type="button" class="btn btn-sm btn-info mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $item->id }}">
                                                    <i class="bi bi-book " style="color: white"></i>
                                                </button>
        
                                                <button type="button" class="btn btn-sm btn-warning mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $item->id }}">
                                                    <i class="bi bi-pencil " style="color: white"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#hapusModal{{ $item->id }}">
                                                    <i class="bi bi-trash " style="color: white"></i>
                                                </button>
        
        
        
                                            </div>
                                        </td>
                                    </tr>
                                    @include('datapengguna.editpengguna')
                                    @include('datapengguna.hapuspengguna')
                                    @include('datapengguna.detailpengguna')
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>

                </div>
                
            </div>

        </div>
    </div>
    @include('datapengguna.tambahpengguna')

@endsection
