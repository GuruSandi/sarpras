<?php

namespace App\Exports;

use App\Models\sarpras;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithDrawings;

class SaranaExport implements FromView, WithDrawings
{
    protected $sarana;

    public function __construct($sarana)
    {
        $this->sarana = $sarana;
    }
    public function view(): View
    {
        $sarana = sarpras::where('jenis_sarpras','sarana')
        ->with('kategori')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('sarana.exportsarana', compact('sarana'));
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
    public function drawings()
    {
        $drawings = [];

        // Logika untuk menambahkan gambar ke dalam ekspor
        foreach ($this->sarana as $index => $item) {
            $drawings[] = $this->drawingsForItem($item->foto, 'E' . ($index + 2));
        }

        return $drawings;
    }
    protected function drawingsForItem($imagePath, $coordinate)
    {
        $drawing = new Drawing();
        $drawing->setPath(public_path($imagePath));
        $drawing->setCoordinates($coordinate);

        return $drawing;
    }
}
