<?php

namespace App\Http\Controllers;

use App\Exports\laporanbarangkeluarExport;
use App\Models\barang_keluar;
use App\Models\sarpras;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Maatwebsite\Excel\Facades\Excel;

class BarangKeluarController extends Controller
{
    public function inputbarangkeluar()
    {
        $barangkeluar = barang_keluar::with('sarpras')->get();
        $sarpras =  sarpras::where('status', 'aktif')->where('stok', '>', 0)->get();
        return view('barangkeluar.inputbarangkeluar', compact('sarpras', 'barangkeluar'));
    }
    public function pilihbarangkeluar($id)
    {
        $barang = sarpras::findOrFail($id);
        $sarpras = sarpras::where('status', 'aktif')->where('stok', '>', 0)->get();
        $barangkeluar = barang_keluar::all();
        return view('barangkeluar.createbarangkeluar', compact('sarpras', 'barangkeluar', 'barang'))->with('status', 'berhasil memilih data');
    }
    public function createbarangkeluar(Request $request)
    {
        $request->validate([
            'sarpras_id' => 'required',
            'tanggal_keluar' => 'required',
            'jumlah' => 'required|numeric',
            'penerima' => 'required',
        ]);
        $sarpras = sarpras::FindOrFail($request->sarpras_id);
        $stok = $sarpras->stok;

        if ($stok < 0) {
            return back()->with('status', 'Maaf jumlah yang Anda masukkan melebihi stok yang ada');
        } else {
            barang_keluar::create([
                'user_id' => Auth::id(),
                'sarpras_id' => $request->sarpras_id,
                'tanggal_keluar' => $request->tanggal_keluar,
                'jumlah' => $request->jumlah,
                'penerima' => $request->penerima,
            ]);

            $sarpras->update([
                'stok' => $stok - $request->jumlah
            ]);
        }



        return redirect()->route('inputbarangkeluar')->with('status', 'Berhasil Menambah data barangkeluar');
    }
    public function editbarangkeluar($id)
    {

        $barangBaru = sarpras::where('status', 'aktif')->where('stok', '>', 0)->get();
        $barangkeluar = barang_keluar::findOrFail($id);
        return view('barangkeluar.editbarangkeluar', compact('barangkeluar', 'barangBaru'));
    }
    public function updatebarangkeluar(Request $request, $id)
    {
        $request->validate([
            'tanggal_keluar' => 'required',
            'jumlah' => 'required|numeric',
            'penerima' => 'required',
            'sarpras_id' => 'required|exists:sarpras,id',
        ]);

        $barangkeluar = barang_keluar::findOrFail($id);

        $sarpras_lama = sarpras::findOrFail($barangkeluar->sarpras_id);
        $stok_lama_sarpras_lama = $sarpras_lama->stok + $barangkeluar->jumlah;

        if ($request->sarpras_id != $barangkeluar->sarpras_id) {
            // Jika sarpras_id diganti
            $sarpras_baru = sarpras::findOrFail($request->sarpras_id);
            $stok_lama_sarpras_baru = $sarpras_baru->stok;

            // Mengembalikan stok sarpras yang lama
            $stok_baru_sarpras_lama = $stok_lama_sarpras_lama;

            // Mengurangi stok sarpras yang baru
            $stok_baru_sarpras_baru = $stok_lama_sarpras_baru - $request->jumlah;

            if ($stok_baru_sarpras_baru < 0) {
                return back()->with('status', 'Maaf, jumlah yang Anda masukkan melebihi stok yang ada');
            }

            // Update stok sarpras baru
            $sarpras_baru->update([
                'stok' => $stok_baru_sarpras_baru
            ]);
        } else {
            // Jika sarpras_id tidak diganti, perbarui stok sarpras yang lama
            $stok_baru_sarpras_lama = $stok_lama_sarpras_lama - $request->jumlah;
        }

        // Update barang keluar
        $barangkeluar->update([
            'user_id' => Auth::id(),
            'tanggal_keluar' => $request->tanggal_keluar,
            'jumlah' => $request->jumlah,
            'penerima' => $request->penerima,
            'sarpras_id' => $request->sarpras_id,
        ]);

        // Update stok sarpras yang lama
        $sarpras_lama->update([
            'stok' => $stok_baru_sarpras_lama
        ]);

        return redirect()->route('inputbarangkeluar')->with('status', 'Berhasil memperbarui data barang keluar');
    }



    public function hapusbarangkeluar($id)
    {

        $barangkeluar = barang_keluar::findOrFail($id);
        $sarpras = sarpras::findOrFail($barangkeluar->sarpras_id);
        $sarpras->update([
            'stok' => $sarpras->stok + $barangkeluar->jumlah
        ]);
        $barangkeluar->delete();
        return redirect()->route('inputbarangkeluar')->with('status', 'Berhasil menghapus data barangkeluar');
    }
    public function laporanbarangkeluar()
    {
        $barangkeluar = barang_keluar::with('sarpras')->get();
        
        return view('barangkeluar.laporanbarangkeluar', compact('barangkeluar'));
    }
    public function filterkeluar(Request $request)
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
        $barangkeluar =barang_keluar::whereBetween('tanggal_keluar', [$startDate, $endDate])->with('sarpras')->get();
       
        if ($request->input('action') == 'download_pdf') {
            // Jika pengguna memilih untuk mengunduh PDF, maka lakukan hal tersebut
            $pdf = FacadePdf::loadView('barangkeluar.cetakpdf', compact('barangkeluar', 'startDate', 'endDate'));
            return $pdf->download('barangkeluar_report.pdf');
        }elseif($request->input('action') == 'download_excel'){
            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = Carbon::parse($request->input('end_date'));
        
            return Excel::download(new laporanbarangkeluarExport($startDate, $endDate), 'barangkeluar_report.xlsx');
        }

        return view('barangkeluar.laporanbarangkeluar', compact('barangkeluar'));
    }
}
