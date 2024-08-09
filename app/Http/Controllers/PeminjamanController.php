<?php

namespace App\Http\Controllers;

use App\Exports\laporanpeminjamanExport;
use App\Models\kategori;
use App\Models\peminjaman;
use App\Models\sarpras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Maatwebsite\Excel\Facades\Excel;



class PeminjamanController extends Controller
{
    //inputpeminjaman
    public function inputpeminjaman()
    {
        $peminjaman = peminjaman::where('status', 'dipinjam')->with('sarpras')->get();
        foreach ($peminjaman as $item) {
            $item->tanggal_pinjam = Carbon::parse($item->tanggal_pinjam)->format('d-m-Y');
        }
        $kategori = kategori::where('nama', 'Barang Habis Pakai')->pluck('id')->toArray();

        $sarpras =  sarpras::where('status','aktif')
        ->where('stok', '>', 0)
        ->where('jenis_sarpras','sarana')
        ->whereNotIn('kategori_id', $kategori)
        ->get();

        return view('peminjaman.inputpeminjaman', compact('sarpras', 'peminjaman'));

    }
    public function pilihbarang($id)
    {
        $barang = sarpras::findOrFail($id);
        $kategori = kategori::where('nama', 'Barang Habis Pakai')->pluck('id')->toArray();

        $sarpras =  sarpras::where('status','aktif')
        ->where('stok', '>', 0)
        ->where('jenis_sarpras','sarana')
        ->whereNotIn('kategori_id', $kategori)
        ->get();
        $peminjaman = peminjaman::all();
        return view('peminjaman.createpeminjaman', compact('sarpras', 'peminjaman', 'barang'))->with('status', 'berhasil memilih data');
    }
    public function createpeminjaman(Request $request)
    {
        $request->validate([
            'sarpras_id' => 'required',
            'tanggal_pinjam' => 'required',
            'kondisi_pinjam' => 'required',
            'jumlah' => 'required|numeric',
            'peminjam' => 'required',
        ]);
        $sarpras = sarpras::FindOrFail($request->sarpras_id);
        $stok = $sarpras->stok;

        if ($stok < $request->jumlah) {
            return back()->with('status', 'Maaf jumlah yang Anda masukkan melebihi stok yang ada');
        } else {
            peminjaman::create([
                'user_id' => Auth::id(),
                'sarpras_id' => $request->sarpras_id,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'kondisi_pinjam' => $request->kondisi_pinjam,
                'jumlah' => $request->jumlah,
                'peminjam' => $request->peminjam,
                'status' => 'dipinjam',
            ]);

            $sarpras->update([
                'stok' => $stok - $request->jumlah
            ]);
        }



        return redirect()->route('inputpeminjaman')->with('status', 'Berhasil Menambah data peminjaman');
    }
    public function editpeminjaman($id)
    {
        $kategori = kategori::where('nama', 'Barang Habis Pakai')->pluck('id')->toArray();

        $barangBaru =  sarpras::where('status','aktif')
        ->where('stok', '>', 0)
        ->where('jenis_sarpras','sarana')
        ->whereNotIn('kategori_id', $kategori)
        ->get();
        $peminjaman = peminjaman::findOrFail($id);
        return view('peminjaman.editpeminjaman', compact('peminjaman', 'barangBaru'));
    }

    public function updatepeminjaman(Request $request, $id)
    {
        $request->validate([
            'tanggal_pinjam' => 'required',
            'kondisi_pinjam' => 'required',
            'jumlah' => 'required|numeric',
            'peminjam' => 'required',
            'sarpras_id' => 'required|exists:sarpras,id',
        ]);

        $peminjaman = peminjaman::findOrFail($id);

        $sarpras_lama = sarpras::findOrFail($peminjaman->sarpras_id);
        $stok_lama_sarpras_lama = $sarpras_lama->stok + $peminjaman->jumlah;

        if ($request->sarpras_id != $peminjaman->sarpras_id) {
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
            if ($stok_baru_sarpras_lama < 0) {
                return back()->with('status', 'Maaf, jumlah yang Anda masukkan melebihi stok yang ada');
            }
        }

        // Update barang keluar
        $peminjaman->update([
            'user_id' => Auth::id(),
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'kondisi_pinjam' => $request->kondisi_pinjam,
            'jumlah' => $request->jumlah,
            'peminjam' => $request->peminjam,
            'sarpras_id' => $request->sarpras_id,
        ]);

        // Update stok sarpras yang lama
        $sarpras_lama->update([
            'stok' => $stok_baru_sarpras_lama
        ]);

        return redirect()->route('inputpeminjaman')->with('status', 'Berhasil memperbarui data peminjaman');
    }


    public function hapuspeminjaman($id)
    {

        $peminjaman = peminjaman::findOrFail($id);
        $sarpras = sarpras::findOrFail($peminjaman->sarpras_id);
        $sarpras->update([
            'stok' => $sarpras->stok + $peminjaman->jumlah
        ]);
        $peminjaman->delete();
        return redirect()->route('inputpeminjaman')->with('status', 'Berhasil menghapus data peminjaman');
    }
    public function laporanpeminjaman()
    {
        $peminjaman = peminjaman::where('status', 'dipinjam')->with('sarpras')->get();
        foreach ($peminjaman as $item) {
            $item->tanggal_pinjam = Carbon::parse($item->tanggal_pinjam)->format('d-m-Y');
        }
        return view('peminjaman.laporanpeminjaman', compact('peminjaman'));
    }
    public function filter(Request $request)
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
        $peminjaman =peminjaman::whereBetween('tanggal_pinjam', [$startDate, $endDate])->where('status', 'dipinjam')->with('sarpras')->get();

        if ($request->input('action') == 'download_pdf') {
            // Jika pengguna memilih untuk mengunduh PDF, maka lakukan hal tersebut
            $pdf = FacadePdf::loadView('peminjaman.cetakpdf', compact('peminjaman', 'startDate', 'endDate'));
            return $pdf->download('peminjaman_report.pdf');
        }elseif($request->input('action') == 'download_excel'){
            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = Carbon::parse($request->input('end_date'));

            return Excel::download(new laporanpeminjamanExport($startDate, $endDate), 'peminjaman_report.xlsx');
        }

        return view('peminjaman.laporanpeminjaman', compact('peminjaman'));
    }
}
