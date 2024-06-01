<?php

namespace App\Http\Controllers;

use App\Exports\laporanpengembalianExport;
use App\Models\peminjaman;
use App\Models\sarpras;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Maatwebsite\Excel\Facades\Excel;

class PengembalianController extends Controller
{
    public function inputpengembalian()
    {
        $pengembalian = peminjaman::where('status', 'dipinjam')->with('sarpras')->get();
        foreach ($pengembalian as $item) {
            $item->tanggal_pinjam = Carbon::parse($item->tanggal_pinjam)->format('d-m-Y');
        }
        return view('pengembalian.inputpengembalian', compact('pengembalian'));
    }
    public function posteditpengembalian($id)
    {
       
        $pengembalian = peminjaman::findOrFail($id);
        $sarpras_lama = sarpras::findOrFail($pengembalian->sarpras_id);
        $stok_lama_sarpras_lama = $sarpras_lama->stok + $pengembalian->jumlah;
        $stok = $stok_lama_sarpras_lama;

        $pengembalian->update([
            'user_id' => Auth::id(),
            'status' => 'kembali',
            'tanggal_kembali' => Carbon::now()->toDateString(),
        ]);

        // Mengembalikan stok sarpras yang lama
        $sarpras_lama->update([
            'stok' => $stok
        ]);
        return redirect()->route('inputpengembalian')->with('status', 'Berhasil mengembalikan data peminjaman');

        
    }
    public function laporanpengembalian()
    {
        $pengembalian = peminjaman::where('status', 'kembali')->with('sarpras')->get();
        foreach ($pengembalian as $item) {
            $item->tanggal_pinjam = Carbon::parse($item->tanggal_pinjam)->format('d-m-Y');
            $item->tanggal_kembali = Carbon::parse($item->tanggal_kembali)->format('d-m-Y');
        }
        return view('pengembalian.laporanpengembalian', compact('pengembalian'));
    }
    
    public function filterkembali(Request $request)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Ambil datapeminjaman berdasarkan rentang tanggal
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $startDate = date('Y-m-d 00:00:00', strtotime($startDate));
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate));
        $pengembalian =peminjaman::whereBetween('tanggal_kembali', [$startDate, $endDate])->where('status', 'kembali')->with('sarpras')->get();
        foreach ($pengembalian as $item) {
            $item->tanggal_pinjam = Carbon::parse($item->tanggal_pinjam)->format('d-m-Y');
            $item->tanggal_kembali = Carbon::parse($item->tanggal_kembali)->format('d-m-Y');
        }
        if ($request->input('action') == 'download_pdf') {
            // Jika pengguna memilih untuk mengunduh PDF, maka lakukan hal tersebut
            $pdf = FacadePdf::loadView('pengembalian.cetakpdf', compact('pengembalian', 'startDate', 'endDate'));
            return $pdf->download('pengembalian_report.pdf');
        }elseif($request->input('action') == 'download_excel'){
            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = Carbon::parse($request->input('end_date'));
        
            return Excel::download(new laporanpengembalianExport($startDate, $endDate), 'pengembalian_report.xlsx');
        }

        return view('pengembalian.laporanpengembalian', compact('pengembalian'));
    }
}
