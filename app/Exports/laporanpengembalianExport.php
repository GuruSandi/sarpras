<?php

namespace App\Exports;

use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporanpengembalianExport implements FromView
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function view(): View
    {
        return view('pengembalian.exportexcel', [
            'pengembalian' => $this->getData()
        ]);
    }
    private function getData()
    {
        // Logic to retrieve data based on $startDate and $endDate
        // For example:
        $pengembalian = peminjaman::whereBetween('tanggal_kembali', [$this->startDate, $this->endDate])->where('status', 'kembali')->with('sarpras')->get();
        foreach ($pengembalian as $item) {
            $item->tanggal_pinjam = Carbon::parse($item->tanggal_pinjam)->format('d-m-Y');
            $item->tanggal_kembali = Carbon::parse($item->tanggal_kembali)->format('d-m-Y');
        }
        return $pengembalian;
    }
    public function columnWidths(): array
    {
        return [
            'A' => 100,
            'B' => 100,
            'C' => 100,
            'D' => 100,
            'E' => 100,
            'F' => 100,
            'G' => 100,
            'H' => 100,
            // Tambahkan baris ini untuk setiap kolom yang ingin Anda atur lebarnya
        ];
    }
    
}
