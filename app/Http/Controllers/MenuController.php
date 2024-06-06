<?php

namespace App\Http\Controllers;

use App\Exports\SebaransarprasExport;
use App\Models\barang_keluar;
use App\Models\peminjaman;
use App\Models\sarpras;
use App\Models\User;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function menu()
    {
        $sarpras = Sarpras::all();

        $dataPeminjaman = Peminjaman::with('sarpras')->get();
        $dataBarangKeluar = barang_keluar::with('sarpras')->get();
    
        $sebaransarpras = $dataPeminjaman->concat($dataBarangKeluar);
        $sebarsarpras=$sebaransarpras->count();

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
        $jumlah_baranghabis = sarpras::where('jenis_sarpras', 'baranghabis')->count();
        $jumlah_prasarana = sarpras::where('jenis_sarpras', 'prasarana')->count();
        $barangkeluar = barang_keluar::with('sarpras')->get();
        $barangKeluarTerakhir = barang_keluar::latest()->take(5)->get();

        return view('Dashboard.dashboard', compact('jumlah_baranghabis','sebarsarpras','barangKeluarTerakhir', 'jumlahdipinjam', 'jumlahkembali', 'jumlahkeluar', 'peminjamanPerHari', 'pengembalianPerHari', 'barangKeluarPerHari', 'jumlah_sarana', 'jumlah_prasarana'));
    }
    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }
    public function posteditprofile(Request $request, User $user)
    {
        $data = $request->validate([
            'foto' => 'file',
            'nama' => 'required',
            'NIP' => 'required|numeric',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img/fotopengguna');
        } else {
            unset($data['foto']);
        }
        $data['password'] = bcrypt($data['password']);
        $user->update($data);

        return redirect()->route('profile')->with('status', 'berhasil mengubah data profile');
    }
    public function sebaransarpras()
    {
        $sarpras = Sarpras::all();

        // Ambil semua data peminjaman
        $dataPeminjaman = Peminjaman::with('sarpras')->get();
        // Ambil semua data barang keluar
        $dataBarangKeluar = barang_keluar::with('sarpras')->get();
    
        $data = $dataPeminjaman->concat($dataBarangKeluar);
        return view('dashboard.sebaransarpras', ['data' => $data, 'sarpras' => $sarpras]);
    }
    public function filtersebaransarpras(Request $request)
    {
        
        $sarpras = Sarpras::all();

        $queryPeminjaman = Peminjaman::query()->with('sarpras')
            ->whereHas('sarpras', function ($query) use ($request) {
                $query->where('kode_sarpras', $request->kode_sarpras);
            });

        $queryBarangKeluar = barang_keluar::query()->with('sarpras')
            ->whereHas('sarpras', function ($query) use ($request) {
                $query->where('kode_sarpras', $request->kode_sarpras);
            });

        // Filter Peminjaman berdasarkan range tanggal
        if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
            $queryPeminjaman->where(function ($q) use ($request) {
                $q->whereBetween('tanggal_pinjam', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tanggal_kembali', [$request->tanggal_awal, $request->tanggal_akhir]);
            });
        }

        // Filter BarangKeluar berdasarkan range tanggal
        if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
            $queryBarangKeluar->whereBetween('tanggal_keluar', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        // Ambil data peminjaman dan barang keluar sesuai query
        $dataPeminjaman = $queryPeminjaman->get();
        $dataBarangKeluar = $queryBarangKeluar->get();

        // Gabungkan data peminjaman dan barang keluar
        $data = $dataPeminjaman->merge($dataBarangKeluar);
        if ($request->input('action') == 'download_pdf') {
            $pdf = FacadePdf::loadView('dashboard.cetakpdf', compact('data', 'sarpras'));
            return $pdf->download('sebaransarpras.pdf');
        } elseif ($request->input('action') == 'download_excel') {
            $kodeSarpras = $request->kode_sarpras;
            $tanggalAwal = $request->tanggal_awal;
            $tanggalAkhir = $request->tanggal_akhir;

            return Excel::download(new SebaransarprasExport($tanggalAwal, $tanggalAkhir, $kodeSarpras), 'sebaransarpras.xlsx');
        }


        return view('dashboard.sebaransarpras', ['data' => $data, 'sarpras' => $sarpras]);
    }
}
