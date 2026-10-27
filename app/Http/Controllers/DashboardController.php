<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Obat;

class DashboardController extends Controller
{
    public function index()
    {
        $obatStokMenipis = Obat::with('kategori')
            ->where('stok', '<', Obat::BATAS_STOK_MENIPIS)
            ->orderBy('stok')
            ->get();

        return view('dashboard', [
            'jumlahObat' => Obat::count(),
            'jumlahKategori' => Kategori::count(),
            'jumlahStokMenipis' => $obatStokMenipis->count(),
            'obatStokMenipis' => $obatStokMenipis,
        ]);
    }
}
