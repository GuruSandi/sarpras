<?php

namespace App\Exports;

use App\Models\barang_keluar;
use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporanbarangkeluarExport implements FromView
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
        return view('barangkeluar.exportexcel', [
            'barangkeluar' => $this->getData()
        ]);
    }
    private function getData()
    {
        // Logic to retrieve data based on $startDate and $endDate
        // For example:
        $barangkeluar = barang_keluar::whereBetween('tanggal_keluar', [$this->startDate, $this->endDate])->with('sarpras')->get();
        foreach ($barangkeluar as $item) {
            $item->tanggal_keluar = Carbon::parse($item->tanggal_keluar)->format('d-m-Y');
        }
        return $barangkeluar;
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
