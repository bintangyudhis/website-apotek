<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Obat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Isi database dengan data contoh kategori dan obat.
     */
    public function run(): void
    {
        $kategori = [
            'Analgesik' => 'Obat pereda nyeri dan penurun demam',
            'Antibiotik' => 'Obat untuk mengatasi infeksi bakteri',
            'Vitamin dan Suplemen' => 'Vitamin dan suplemen untuk menjaga daya tahan tubuh',
            'Obat Batuk dan Flu' => 'Obat untuk meredakan gejala batuk, pilek, dan flu',
        ];

        $idKategori = [];
        foreach ($kategori as $nama => $deskripsi) {
            $idKategori[$nama] = Kategori::create([
                'nama' => $nama,
                'deskripsi' => $deskripsi,
            ])->id;
        }

        $obat = [
            ['Paracetamol 500 mg', 'Analgesik', 'tablet', 120, 5000, '2027-06-30'],
            ['Ibuprofen 400 mg', 'Analgesik', 'tablet', 8, 8500, '2027-03-31'],
            ['Asam Mefenamat 500 mg', 'Analgesik', 'kapsul', 45, 12000, '2026-12-31'],
            ['Amoxicillin 500 mg', 'Antibiotik', 'kapsul', 60, 15000, '2027-01-31'],
            ['Cefadroxil 500 mg', 'Antibiotik', 'kapsul', 6, 22000, '2026-11-30'],
            ['Ciprofloxacin 500 mg', 'Antibiotik', 'tablet', 30, 18000, '2027-08-31'],
            ['Vitamin C 500 mg', 'Vitamin dan Suplemen', 'tablet', 200, 25000, '2028-01-31'],
            ['Vitamin D3 1000 IU', 'Vitamin dan Suplemen', 'tablet', 75, 45000, '2027-10-31'],
            ['Sangobion', 'Vitamin dan Suplemen', 'kapsul', 9, 28000, '2027-05-31'],
            ['OBH Combi 100 ml', 'Obat Batuk dan Flu', 'botol', 40, 17500, '2027-04-30'],
            ['Cetirizine 10 mg', 'Obat Batuk dan Flu', 'tablet', 85, 6000, '2027-09-30'],
            ['Bodrex Flu dan Batuk', 'Obat Batuk dan Flu', 'strip', 5, 4500, '2026-12-15'],
        ];

        foreach ($obat as [$nama, $namaKategori, $satuan, $stok, $harga, $kadaluarsa]) {
            Obat::create([
                'kategori_id' => $idKategori[$namaKategori],
                'nama' => $nama,
                'satuan' => $satuan,
                'stok' => $stok,
                'harga' => $harga,
                'tanggal_kadaluarsa' => $kadaluarsa,
            ]);
        }
    }
}
