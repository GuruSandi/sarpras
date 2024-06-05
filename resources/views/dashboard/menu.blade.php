@extends('template.sidebar')
@section('title', 'Dashboard')

@section('content')

    <div class="row mb-5">
        <div class="col-12 col-sm-6 col-md-3 mb-3">
            <a href="{{ route('laporanpeminjaman') }}" style="text-decoration: none">
                <div class="card p-3 shadow">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left" style="color: #0a0942">
                            <div class="d-flex align-items-center my-2">
                                <h4 class="mb-0 me-2 fw-bold">{{ $jumlahdipinjam }}</h4>

                            </div>
                            <span>Jumlah Peminjaman</span>

                            <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary" style="background-color: #2ea1ff">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-3">
            <a href="{{ route('laporanpengembalian') }}" style="text-decoration: none">
                <div class="card p-3 shadow">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left" style="color: #0a0942">
                            <div class="d-flex align-items-center my-2">
                                <h4 class="mb-0 me-2 fw-bold">{{ $jumlahkembali }}</h4>
                                
                            </div>
                            <span>Jumlah Pengembalian</span>

                            <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary" style="background-color: #2eff5b">
                                <i class="bi bi-file-earmark-text"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-3">
            <a href="{{ route('laporanbarangkeluar') }}" style="text-decoration: none">
                <div class="card p-3 shadow">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left" style="color: #0a0942">
                            <div class="d-flex align-items-center my-2">
                                <h4 class="mb-0 me-2 fw-bold">{{ $jumlahkeluar }}</h4>

                            </div>
                            <span>Jumlah Barang Keluar</span>

                            <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary" style="background-color: #ff462e">
                                <i class="bi bi-box-arrow-right"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-3">
            <div class="card p-3 shadow">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left" style="color: #0a0942">
                        <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2 fw-bold">23</h4>

                        </div>
                        <span>Sebaran Sarpras</span>

                        <p class="mb-0"></p>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-primary" style="background-color: #c42eff">
                            <i class="bi bi-diagram-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-5" style="color: #0a0942">Grafik Peminjaman, Pengembalian dan Barang Keluar
                        </h5>
                        <canvas id="gelombangPerHari" style="width: 400px; height: 200px;"></canvas>


                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-5" style="color: #0a0942">Sarana dan Prasarana
                        </h5>
                        <canvas id="pieChart" class="mb-4"></canvas>


                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-5" style="color: #0a0942">Laporan Barang Keluar</h5>
                        <table class="table table-striped" style="font-size: 16px;">
                            <thead>
                                <tr>
                                    <th style="color: #0a0942">No</th>
                                    <th style="color: #0a0942">Tanggal</th>
                                    <th style="color: #0a0942">Kode Barang</th>
                                    <th style="color: #0a0942">Nama Sarpras</th>
                                    <th style="color: #0a0942">Jumlah</th>
                                    <th style="color: #0a0942">Penerima</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangKeluarTerakhir as $item)
                                    <tr>
                                        <td style="color: #0a0942">{{ $loop->iteration }}</td>

                                        <td style="color: #0a0942">{{ $item->tanggal_keluar }}</td>
                                        <td style="color: #0a0942">{{ $item->sarpras->kode_sarpras }}</td>
                                        <td style="color: #0a0942">{{ $item->sarpras->nama_sarpras }}</td>
                                        <td style="color: #0a0942">{{ $item->jumlah }}</td>
                                        <td style="color: #0a0942">{{ $item->penerima }}</td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <p style="font-size: 16px; color: #0a0942;"><em>5 pengeluaran Barang terakhir</em></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-rough"></script>
    <script>
        var ctx = document.getElementById('gelombangPerHari').getContext('2d');
        var gelombangPerHari = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($peminjamanPerHari as $data)
                        '{{ $data->tanggal }}',
                    @endforeach
                ],
                datasets: [{
                        label: 'Peminjaman',
                        data: [
                            @foreach ($peminjamanPerHari as $data)
                                {{ $data->jumlah_peminjaman }},
                            @endforeach
                        ],
                        fill: true,
                        backgroundColor: 'rgba(0, 123, 255, 0.5',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 2
                    },
                    {
                        label: 'Pengembalian',
                        data: [
                            @foreach ($pengembalianPerHari as $data)
                                {{ $data->jumlah_pengembalian }},
                            @endforeach
                        ],
                        fill: true,
                        backgroundColor: 'rgba(46, 255, 91, 0.5)',
                        borderColor: 'rgba(46, 255, 91, 1)',
                        borderWidth: 2
                    },
                    {
                        label: 'Barang Keluar',
                        data: [
                            @foreach ($barangKeluarPerHari as $data)
                                {{ $data->jumlah_barang_keluar }},
                            @endforeach
                        ],
                        fill: true,
                        backgroundColor: 'rgba(255, 70, 46, 0.5)',
                        borderColor: 'rgba(255, 70, 46, 1)',
                        borderWidth: 2
                    },

                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Sarana',
                    'Prasarana'
                ],
                datasets: [{
                    label: 'Jumlah Sarana dan Prasarana',
                    data: [
                        {{ $jumlah_sarana }},
                        {{ $jumlah_prasarana }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)', // Warna untuk Sarana
                        'rgba(54, 162, 235, 0.5)' // Warna untuk Prasarana
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', // Warna border untuk Sarana
                        'rgba(54, 162, 235, 1)' // Warna border untuk Prasarana
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Jumlah Sarana dan Prasarana'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    </script>



@endsection
