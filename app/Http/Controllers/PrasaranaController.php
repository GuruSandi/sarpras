<?php

namespace App\Http\Controllers;

use App\Exports\PrasaranaExport;
use Illuminate\Http\Request;
use App\Models\sarpras;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
class PrasaranaController extends Controller
{
    public function homeprasarana()
    {
        $prasarana = sarpras::where('jenis_sarpras','prasarana')->get();
        return view('prasarana.homeprasarana', compact('prasarana'));
    }
    public function tambahprasarana()
    {
        return view('prasarana.tambahprasarana');
    }
    public function posttambahprasarana(Request $request)
    {
        $request->validate([
            'nama_sarpras' => 'required',
            'foto' => 'required|file',
            'stok' => 'required|numeric',
            'penerima_barang' => 'required',
        ]);
        sarpras::create([
            'kode_sarpras' => 'KD'.Str::random(4),
            'nama_sarpras' => $request->nama_sarpras,
            'foto' => $request->foto->store('img/prasarana'),
            'stok' => $request->stok,
            'penerima_barang' => $request->penerima_barang,
            'status' => 'aktif',
            'jenis_sarpras' => 'prasarana',
        ]);
        
        return redirect()->route('homeprasarana')->with('status', 'Berhasil Menambah data prasarana');
    }
    public function editprasarana(sarpras $sarpras)
    {
        return view('prasarana.editprasarana', compact('sarpras'));
    }
    public function posteditprasarana(Request $request, sarpras $sarpras)
    {
        $data =  $request->validate([
            'nama_sarpras' => 'required',
            'foto' => 'file',
            'stok' => 'required|numeric',
            'penerima_barang' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img/prasarana');
        } else {
            unset($data['foto']);
        }
        $sarpras->update($data);
        
        return redirect()->route('homeprasarana')->with('status', 'Berhasil mengubah data prasarana');
    }
    public function hapusprasarana(sarpras $sarpras)
    {
        $sarpras->delete();
      
        return redirect()->route('homeprasarana')->with('status', 'Berhasil Menghapus data prasarana');
    }
    public function detailprasarana(sarpras $sarpras)
    {
       
        return view('prasarana.detailprasarana', compact('sarpras'));
      
        return redirect()->route('homeprasarana')->with('status', 'Berhasil Menghapus data prasarana');
    }
    public function exportDataprasarana()
    {
        $sheet = new Worksheet();
        $export = new PrasaranaExport($sheet);
        return Excel::download($export, 'Data_prasarana.xlsx');
    }
    public function cetakpdf()
    {
        
        $prasarana = sarpras::where('jenis_sarpras','prasarana')->get();
        $pdf= FacadePdf::loadView('prasarana.cetakpdf', compact('prasarana'));
        
        return $pdf->download('data_prasarana.pdf');
    }
}
