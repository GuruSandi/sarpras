<?php

namespace App\Exports;

use App\Models\sarpras;
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
        $jenisPrasarana = $this->prasarana
            ? sarpras::where('jenis_prasarana', $this->prasarana)->get()
            : sarpras::whereNull('jenis_prasarana')
            ->where('jenis_sarpras', 'prasarana')
            ->get();

            // dd($jenisPrasarana);
        return view('prasarana.exportprasarana', [
            'prasarana' => $jenisPrasarana
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

        // Ambil data berdasarkan jenis prasarana
        $items = $this->prasarana
            ? sarpras::where('jenis_prasarana', $this->prasarana)->get()
            : sarpras::whereNull('jenis_prasarana')
            ->where('jenis_sarpras', 'prasarana')->get();

        // foreach ($items as $index => $item) {
        //     if ($item->foto) {
        //         $drawings[] = $this->drawingsForItem($item->foto, 'E' . ($index + 2));
        //     }
        // }

        return $drawings;
    }

    protected function drawingsForItem($imagePath, $coordinate)
    {
        $drawing = new Drawing();
        $drawing->setPath(public_path($imagePath));
        $drawing->setCoordinates($coordinate);
        $drawing->setWidth(100); // set width
        $drawing->setHeight(100); // set height

        return $drawing;
    }

}
