@extends('template.sidebar')
@section('title', 'Data Belum Kembali')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">


                        <table class="table tabel-bordered tabel-sm" id="example" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Sarpras</th>
                                    <th>Kondisi Pinjam</th>
                                    <th>Jumlah</th>
                                    <th>Peminjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($databelumkembali as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $item->tanggal_pinjam }}</td>

                                        <td>{{ $item->sarpras->kode_sarpras }}</td>
                                        <td>{{ $item->sarpras->nama_sarpras }}</td>
                                        <td>{{ $item->kondisi_pinjam }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->peminjam }}</td>
                                        <td>
                                            @if ($item->status == 'dipinjam')
                                                <div class="btn btn-sm" style="background-color: #dc3545; color: white">
                                                    Belum Dikembalikan

                                                </div>
                                            @endif
                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <h1>Sebaran Sarana Prasarana</h1>

    <div class="chart-container">
        <canvas id="sarprasChart" class="chart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('sarprasChart').getContext('2d');
        var sarprasChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Komputer', 'Meja', 'Kursi', 'Proyektor', 'Lainnya'],
                datasets: [{
                    label: 'Jumlah',
                    data: [30, 20, 25, 15, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Distribusi Sarana Prasarana'
                }
            }
        });
    </script>

@endsection
