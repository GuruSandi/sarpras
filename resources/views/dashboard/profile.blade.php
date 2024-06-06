@extends('template.sidebar')
@section('title', 'Profile')

@section('content')

    <div class="row mb-5">
        <div class="col-12">
            @if (Session::has('status'))
                <div class="pesan pesan-success d-flex justify-content-between align-items-center position-fixed top-0 end-0"
                    style="font-size: 13px; z-index: 1050; width: 410px;">
                    <div class="mr-auto" style="font-weight: bold"> <i class="bi bi-check-circle"></i> Success:
                        {{ Session::get('status') }}</div>
                    <!-- mr-auto untuk memberikan margin kanan otomatis agar teks sejajar dengan tombol close -->
                    <button type="button" class="close ml-2" data-dismiss="pesan" aria-label="Close">
                        <!-- ml-2 untuk memberikan margin kiri -->
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card shadow p-3">
                <div class="card-body fw-bold" style="color: #0a0942;">
                    <div class="row">
                        <div class="col-4">
                            <img id="previewFoto" src="{{ asset($user->foto) }}" alt="" width="250px"
                                height="250px">
                        </div>
                        <div class="col-8">
                            <form action="{{ route('posteditprofile', $user->id) }}" class="form-group"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" accept="img/fotopengguna/*" class="form-control form-control-sm " name="foto"
                                    id="foto" onchange="previewFile()">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control form-control-sm " required name="nama" id="nama"
                                    value="{{ $user->nama }}">

                                <label for="NIP" class="form-label">NIP</label>
                                <input type="text" class="form-control form-control-sm" required name="NIP" id="NIP"
                                    value="{{ $user->NIP }}">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" required name="email" id="email"
                                    value="{{ $user->email }}">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-sm" required name="password" id="password"
                                    value="{{ $user->password }}">

                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control form-control-sm" required>
                                    <option value="aktif" @if ($user->status == 'aktif') selected @endif>Aktif</option>
                                    <option value="tidak" @if ($user->status == 'tidak') selected @endif>Tidak Aktif
                                    </option>
                                </select>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        function previewFile() {
            const preview = document.getElementById('previewFoto');
            const file = document.querySelector('input[type=file]').files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection
