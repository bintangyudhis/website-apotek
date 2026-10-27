@extends('layouts.app')

@section('judul', 'Dashboard')

@section('konten')
    <h1>Dashboard</h1>
    <p class="subjudul">Ringkasan data apotek saat ini.</p>

    <div class="kartu-baris">
        <div class="kartu">
            <span class="kartu-angka">{{ $jumlahObat }}</span>
            <span class="kartu-label">Jenis obat</span>
        </div>
        <div class="kartu">
            <span class="kartu-angka">{{ $jumlahKategori }}</span>
            <span class="kartu-label">Kategori obat</span>
        </div>
        <div class="kartu kartu-peringatan">
            <span class="kartu-angka">{{ $jumlahStokMenipis }}</span>
            <span class="kartu-label">Obat stok menipis</span>
        </div>
    </div>

    <h2>Obat dengan stok menipis</h2>
    <p class="subjudul">Stok di bawah {{ \App\Models\Obat::BATAS_STOK_MENIPIS }} perlu segera ditambah.</p>

    @if ($obatStokMenipis->isEmpty())
        <p>Tidak ada obat dengan stok menipis.</p>
    @else
        <table class="tabel">
            <thead>
                <tr>
                    <th>Nama obat</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Kadaluarsa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obatStokMenipis as $obat)
                    <tr>
                        <td>{{ $obat->nama }}</td>
                        <td>{{ $obat->kategori->nama }}</td>
                        <td><span class="lencana-merah">{{ $obat->stok }} {{ $obat->satuan }}</span></td>
                        <td>{{ $obat->tanggal_kadaluarsa->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
