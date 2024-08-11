<?php

namespace App\Http\Controllers;

use App\Exports\PrasaranaExport;
use Illuminate\Http\Request;
use App\Models\sarpras;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Storage; 
class PrasaranaController extends Controller
{
    public function homeprasarana()
    {
        $kode = 'PR-' . mt_rand(10000, 99999);

        $prasarana = sarpras::where('jenis_sarpras', 'prasarana')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('prasarana.homeprasarana', compact('prasarana', 'kode'));
    }
    public function tambahprasarana()
    {
        return view('prasarana.tambahprasarana');
    }
    public function posttambahprasarana1(Request $request)
    {
        $request->validate([
            'nama_sarpras' => 'required',
            'foto' => 'required|file',
            'stok' => 'required|numeric',
            'penerima_barang' => 'required',
        ]);
        sarpras::create([
            'kode_sarpras' => 'KD' . Str::random(4),
            'nama_sarpras' => $request->nama_sarpras,
            'foto' => $request->foto->store('img/prasarana'),
            'stok' => $request->stok,
            'penerima_barang' => $request->penerima_barang,
            'status' => 'aktif',
            'jenis_sarpras' => 'prasarana',
        ]);

        return redirect()->route('homeprasarana')->with('status', 'Berhasil Menambah data prasarana');
    }
    public function posttambahprasarana(Request $request)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'kode_sarpras' => 'required',
            'nama_sarpras' => 'required',
            'foto' => 'required|file|image', // Validasi foto sebagai gambar
            'jenis_prasarana' => 'nullable',
            'jumlah' => 'nullable',
            'jumlahruang' => 'nullable',
            'jumlah_ruang_kelas' => 'nullable',
            'kapasitas_ruang' => 'nullable',
            'fasilitas' => 'nullable',
            'fasilitasruang' => 'nullable',
            'sanitasi' => 'nullable',
            'jenis_ruangan' => 'nullable|string',
            'peralatan_tersedia' => 'nullable',
            'jenis_koleksi' => 'nullable',
            'luas_ruang' => 'nullable',
            'jenis_laboratorium' => 'nullable',
            'ukuran_lapangan' => 'nullable',
            'kondisi_lapangan' => 'nullable',
            'kondisi_barang' => 'nullable',
            'tahun_pembangunan' => 'nullable',
            'sumber_dana' => 'nullable',
            'luas_bangunan' => 'nullable',
            'status_kepemilikan' => 'nullable',
            'fungsi_prasarana' => 'nullable',
            'status' => 'nullable',
            'kapasitas_penggunaan' => 'nullable',
            'jenis_sarpras' => 'required',
        ]);
        // dd($request->all());
        // Proses penyimpanan file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Menyimpan file ke direktori public/img/prasarana dan mendapatkan path-nya
            $filePath = $file->store('img/prasarana', 'public');
            // Menambahkan path file ke validatedData
            $validatedData['foto'] = $filePath;
        }

        // Menyimpan data ke database
        sarpras::create($validatedData);

        // Redirect ke halaman yang diinginkan dengan status berhasil
        return redirect()->route('homeprasarana')->with('status', 'Berhasil Menambah data prasarana');
    }


    public function editprasarana(sarpras $sarpras)
    {
        return view('prasarana.editprasarana', compact('sarpras'));
    }
    public function posteditprasarana(Request $request, $id)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'kode_sarpras' => 'required',
            'nama_sarpras' => 'required',
            'foto' => 'nullable|file|image', // Validasi foto sebagai gambar jika ada
            'jumlah' => 'nullable',
            'jumlahruang' => 'nullable',
            'jumlah_ruang_kelas' => 'nullable',
            'kapasitas_ruang' => 'nullable',
            'fasilitas' => 'nullable',
            'fasilitasruang' => 'nullable',
            'sanitasi' => 'nullable',
            'jenis_ruangan' => 'nullable|string',
            'peralatan_tersedia' => 'nullable',
            'jenis_koleksi' => 'nullable',
            'luas_ruang' => 'nullable',
            'jenis_laboratorium' => 'nullable',
            'ukuran_lapangan' => 'nullable',
            'kondisi_lapangan' => 'nullable',
            'kondisi_barang' => 'nullable',
            'tahun_pembangunan' => 'nullable',
            'sumber_dana' => 'nullable',
            'luas_bangunan' => 'nullable',
            'status_kepemilikan' => 'nullable',
            'fungsi_prasarana' => 'nullable',
            'status' => 'nullable',
            'kapasitas_penggunaan' => 'nullable',
        ]);
        // dd($request->all());

        // Cari data prasarana yang akan diupdate
        $prasarana = sarpras::findOrFail($id);

        // Proses penyimpanan file jika ada file baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Menyimpan file ke direktori public/img/prasarana dan mendapatkan path-nya
            $filePath = $file->store('img/prasarana', 'public');
            // Hapus file lama jika ada
            if ($prasarana->foto) {
                Storage::disk('public')->delete($prasarana->foto);
            }
            // Tambahkan path file baru ke validatedData
            $validatedData['foto'] = $filePath;
        }

        // Update data prasarana dengan data baru
        $prasarana->update($validatedData);

        // Redirect ke halaman yang diinginkan dengan status berhasil
        return redirect()->route('homeprasarana')->with('status', 'Berhasil Mengubah data prasarana');
    }

    public function posteditprasarana1(Request $request, sarpras $sarpras)
    {
        $data = $request->validate([
            'kode_sarpras' => 'required',
            'nama_sarpras' => 'required',
            'foto' => 'required|file|image', // Validasi foto sebagai gambar
            'jenis_prasarana' => 'nullable',
            'jumlah' => 'nullable',
            'jumlahruang' => 'nullable',
            'jumlah_ruang_kelas' => 'nullable',
            'kapasitas_ruang' => 'nullable',
            'fasilitas' => 'nullable',
            'fasilitasruang' => 'nullable',
            'sanitasi' => 'nullable',
            'jenis_ruangan' => 'nullable|string',
            'peralatan_tersedia' => 'nullable',
            'jenis_koleksi' => 'nullable',
            'luas_ruang' => 'nullable',
            'jenis_laboratorium' => 'nullable',
            'ukuran_lapangan' => 'nullable',
            'kondisi_lapangan' => 'nullable',
            'kondisi_barang' => 'nullable',
            'tahun_pembangunan' => 'nullable',
            'sumber_dana' => 'nullable',
            'luas_bangunan' => 'nullable',
            'status_kepemilikan' => 'nullable',
            'fungsi_prasarana' => 'nullable',
            'status' => 'nullable',
            'kapasitas_penggunaan' => 'nullable',
            'jenis_sarpras' => 'required',
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
    public function exportDataprasarana1()
    {
        $sheet = new Worksheet();
        $export = new PrasaranaExport($sheet);
        return Excel::download($export, 'Data_prasarana.xlsx');
    }
    public function exportDataprasarana(Request $request)
    {
        $prasarana = $request->input('jenis_prasarana');
        return Excel::download(new PrasaranaExport($prasarana), 'prasarana.xlsx');
    }
    public function cetakpdf()
    {

        $prasarana = sarpras::where('jenis_sarpras', 'prasarana')->get();
        $pdf = FacadePdf::loadView('prasarana.cetakpdf', compact('prasarana'));

        return $pdf->download('data_prasarana.pdf');
    }
}
