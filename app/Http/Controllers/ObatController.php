<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        $obats = Obat::with('kategori')
            ->when($cari, function ($query) use ($cari) {
                $query->where('nama', 'like', '%' . $cari . '%');
            })
            ->orderBy('nama')
            ->get();

        return view('obat.index', compact('obats', 'cari'));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama')->get();

        return view('obat.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $data = $this->validasi($request);

        Obat::create($data);

        return redirect()->route('obat.index')->with('sukses', 'Obat berhasil ditambahkan.');
    }

    public function edit(Obat $obat)
    {
        $kategoris = Kategori::orderBy('nama')->get();

        return view('obat.edit', compact('obat', 'kategoris'));
    }

    public function update(Request $request, Obat $obat)
    {
        $data = $this->validasi($request);

        $obat->update($data);

        return redirect()->route('obat.index')->with('sukses', 'Obat berhasil diubah.');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obat.index')->with('sukses', 'Obat berhasil dihapus.');
    }

    private function validasi(Request $request): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:150'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'satuan' => ['required', 'string', 'max:30'],
            'stok' => ['required', 'integer', 'min:0'],
            'harga' => ['required', 'integer', 'min:0'],
            'tanggal_kadaluarsa' => ['required', 'date'],
        ]);
    }
}
