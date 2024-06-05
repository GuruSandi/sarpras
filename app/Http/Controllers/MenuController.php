<?php

namespace App\Http\Controllers;

use App\Models\barang_keluar;
use App\Models\peminjaman;
use App\Models\sarpras;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        $jumlahdipinjam = peminjaman::where('status', 'dipinjam')->count();
        $jumlahkembali = peminjaman::where('status', 'kembali')->count();
        $jumlahkeluar = barang_keluar::count();
        $peminjamanPerHari = Peminjaman::selectRaw('DATE(tanggal_pinjam) as tanggal, COUNT(*) as jumlah_peminjaman')
            ->where('status', 'dipinjam')
            ->groupBy('tanggal')
            ->get();
        $pengembalianPerHari = Peminjaman::selectRaw('DATE(created_at) as tanggal, COUNT(*) as jumlah_pengembalian')
            ->where('status', 'kembali')
            ->groupBy('tanggal')
            ->get();

        // Mengambil jumlah barang yang keluar per hari
        $barangKeluarPerHari = barang_keluar::selectRaw('DATE(created_at) as tanggal, COUNT(*) as jumlah_barang_keluar')
            ->groupBy('tanggal')
            ->get();
        $jumlah_sarana = sarpras::where('jenis_sarpras', 'sarana')->count();
        $jumlah_prasarana = sarpras::where('jenis_sarpras', 'prasarana')->count();
        $barangkeluar = barang_keluar::with('sarpras')->get();
        $barangKeluarTerakhir = barang_keluar::latest()->take(5)->get();

        return view('Dashboard.menu', compact('barangKeluarTerakhir','jumlahdipinjam', 'jumlahkembali', 'jumlahkeluar', 'peminjamanPerHari', 'pengembalianPerHari', 'barangKeluarPerHari', 'jumlah_sarana', 'jumlah_prasarana'));
    }
}
