<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SebaranSarprasController extends Controller
{
    public function databelumkembali()
    {
        $databelumkembali = peminjaman::where('status', 'dipinjam')->with('sarpras')->get();
        foreach ($databelumkembali as $item) {
            $item->tanggal_pinjam = Carbon::parse($item->tanggal_pinjam)->format('d-m-Y');
        }
        return view('sebaransarpras.databelumkembali', compact('databelumkembali'));
    }
}
