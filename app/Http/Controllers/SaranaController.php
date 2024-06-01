<?php

namespace App\Http\Controllers;

use App\Exports\SaranaExport;
use App\Models\sarpras;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SaranaController extends Controller
{
    public function homesarana()
    {
        $sarana = sarpras::where('jenis_sarpras','sarana')->get();
        return view('sarana.homesarana', compact('sarana'));
    }
    public function tambahsarana()
    {
        return view('sarana.tambahsarana');
    }
    public function posttambahsarana(Request $request)
    {
        $request->validate([
            'nama_sarpras' => 'required',
            'foto' => 'required|file',
            'stok' => 'required|numeric',
            'penerima_barang' => 'required',
        ]);
        sarpras::create([
            'kode_sarpras' => 'KD-'.mt_rand(10000, 99999),
            'nama_sarpras' => $request->nama_sarpras,
            'foto' => $request->foto->store('img/sarana'),
            'stok' => $request->stok,
            'penerima_barang' => $request->penerima_barang,
            'status' => 'aktif',
            'jenis_sarpras' => 'sarana',
        ]);
        
        return redirect()->route('homesarana')->with('status', 'Berhasil Menambah data sarana');
    }
    public function editsarana($id)
    {
        $sarana = sarpras::findOrFail($id);
        return view('sarana.editsarana', compact('sarana'));
    }
    public function posteditsarana(Request $request, sarpras $sarpras)
    {
        $data =  $request->validate([
            'nama_sarpras' => 'required',
            'foto' => 'file',
            'stok' => 'required|numeric',
            'penerima_barang' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img/sarana');
        } else {
            unset($data['foto']);
        }
        $sarpras->update($data);
        
        return redirect()->route('homesarana')->with('status', 'Berhasil mengubah data sarana');
    }
    public function hapussarana(sarpras $sarpras)
    {
        $sarpras->delete();
      
        return redirect()->route('homesarana')->with('status', 'Berhasil Menghapus data sarana');
    }
    public function detailsarana(sarpras $sarpras)
    {
       
        return view('sarana.detailsarana', compact('sarpras'));
      
        return redirect()->route('homesarana')->with('status', 'Berhasil Menghapus data sarana');
    }
    public function exportDataSarana()
    {
        $sheet = new Worksheet();
        $export = new SaranaExport($sheet);
        return Excel::download($export, 'Data_Sarana.xlsx');
    }
    public function cetakpdf()
    {
        
        $sarana = sarpras::where('jenis_sarpras','sarana')->get();
        $pdf= FacadePdf::loadView('sarana.cetakpdf', compact('sarana'));
        
        return $pdf->download('data_sarana.pdf');
    }
}
