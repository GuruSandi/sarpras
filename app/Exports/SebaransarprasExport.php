<?php

namespace App\Exports;

use App\Models\Peminjaman;
use App\Models\barang_keluar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SebaransarprasExport implements FromView
{
    protected $tanggalAwal;
    protected $tanggalAkhir;
    protected $kodeSarpras;

    public function __construct($tanggalAwal, $tanggalAkhir, $kodeSarpras)
    {
        $this->tanggalAwal = $tanggalAwal;
        $this->tanggalAkhir = $tanggalAkhir;
        $this->kodeSarpras = $kodeSarpras;
    }

    public function view(): View
    {
        $peminjaman = Peminjaman::with('sarpras')
            ->whereHas('sarpras', function ($query) {
                $query->where('kode_sarpras', $this->kodeSarpras);
            })
            ->where(function ($query) {
                $query->whereBetween('tanggal_pinjam', [$this->tanggalAwal, $this->tanggalAkhir])
                      ->orWhereBetween('tanggal_kembali', [$this->tanggalAwal, $this->tanggalAkhir]);
            })
            ->get();

        $barang_keluar = barang_keluar::with('sarpras')
            ->whereHas('sarpras', function ($query) {
                $query->where('kode_sarpras', $this->kodeSarpras);
            })
            ->whereBetween('tanggal_keluar', [$this->tanggalAwal, $this->tanggalAkhir])
            ->get();

        $data = $peminjaman->merge($barang_keluar);

        return view('dashboard.exportexcel', [
            'data' => $data,
        ]);
    }
}
