<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithDrawings;

class PrasaranaExport implements FromView, WithDrawings
{
    protected $prasarana;

    public function __construct($prasarana)
    {
        $this->prasarana = $prasarana;
    }
    public function view(): View
    {
        return view('prasarana.exportprasarana', [
            'prasarana' => DB::table('sarpras')
                ->where('jenis_sarpras', 'prasarana')
                ->get()
        ]);
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
        foreach ($this->prasarana as $index => $item) {
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
