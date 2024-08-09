<?php

namespace App\Http\Controllers;

use App\Exports\SaranaExport;
use App\Models\kategori;
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
        $sarana = sarpras::where('jenis_sarpras','sarana')
        ->with('kategori')
        ->orderBy('created_at', 'desc')
        ->get();
        $data = kategori::all();
        $kode = 'KD-'.mt_rand(10000, 99999);
        return view('sarana.homesarana', compact('sarana','data','kode'));
    }
    public function tambahsarana()
    {
        return view('sarana.tambahsarana');
    }
    public function posttambahsarana(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'kode_sarpras' => 'required',
            'nama_sarpras' => 'required',
            'merk_barang' => 'required',
            'spesifikasi_barang' => 'required',
            'kondisi_barang' => 'required',
            'foto' => 'required|file',
            'stok' => 'required|numeric',

        ]);
        sarpras::create([
            'kode_sarpras' => $request->kode_sarpras,
            'kategori_id' => $request->kategori_id,
            'nama_sarpras' => $request->nama_sarpras,
            'merk_barang' => $request->merk_barang,
            'spesifikasi_barang' => $request->spesifikasi_barang,
            'kondisi_barang' => $request->kondisi_barang,
            'foto' => $request->foto->store('img/sarana'),
            'stok' => $request->stok,
            'status' => 'aktif',
            'jenis_sarpras' => 'sarana',

        ]);
        
        return redirect()->route('homesarana')->with('status', 'Berhasil Menambahkan Data Sarana');
    }
    public function editsarana($id)
    {
        $sarana = sarpras::findOrFail($id);
        return view('sarana.editsarana', compact('sarana'));
    }
    public function posteditsarana(Request $request, sarpras $sarpras)
    {
        $data = $request->validate([
            'kategori_id' => 'required',
            'nama_sarpras' => 'required',
            'merk_barang' => 'required',
            'spesifikasi_barang' => 'required',
            'kondisi_barang' => 'required',
            'foto' => 'file|image',
            'stok' => 'required|numeric',
            'status' => 'required',
        ]);
        // dd($data);
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
        
        $sarana = sarpras::where('jenis_sarpras','sarana')
        ->with('kategori')
        ->orderBy('created_at', 'desc')
        ->get();
        $pdf= FacadePdf::loadView('sarana.cetakpdf', compact('sarana'));
        
        return $pdf->download('data_sarana.pdf');
    }
}
