<?php

namespace App\Exports;

use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporanpeminjamanExport implements FromView
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
        return view('peminjaman.exportexcel', [
            'peminjaman' => $this->getData()
        ]);
    }
    private function getData()
    {
        // Logic to retrieve data based on $startDate and $endDate
        // For example:
        $peminjaman = peminjaman::whereBetween('tanggal_pinjam', [$this->startDate, $this->endDate])->where('status', 'dipinjam')->with('sarpras')->get();
        foreach ($peminjaman as $item) {
            $item->tanggal_pinjam = Carbon::parse($item->tanggal_pinjam)->format('d-m-Y');
        }
        return $peminjaman;
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
