@extends('layouts.app')

@section('judul', 'Daftar Obat')

@section('konten')
    <div class="judul-baris">
        <div>
            <h1>Daftar Obat</h1>
            <p class="subjudul">Semua obat yang tercatat beserta stok dan harganya.</p>
        </div>
        <a class="tombol" href="{{ route('obat.create') }}">Tambah Obat</a>
    </div>

    <form method="GET" action="{{ route('obat.index') }}" class="pencarian">
        <input type="search" name="cari" value="{{ $cari }}" placeholder="Cari nama obat">
        <button type="submit" class="tombol tombol-kecil">Cari</button>
        @if ($cari)
            <a href="{{ route('obat.index') }}">Hapus pencarian</a>
        @endif
    </form>

    @if ($obats->isEmpty())
        <p>{{ $cari ? 'Tidak ada obat yang cocok dengan pencarian.' : 'Belum ada obat. Tambahkan obat pertama lewat tombol di atas.' }}</p>
    @else
        <table class="tabel">
            <thead>
                <tr>
                    <th>Nama obat</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Kadaluarsa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obats as $obat)
                    <tr>
                        <td>{{ $obat->nama }}</td>
                        <td>{{ $obat->kategori->nama }}</td>
                        <td>{{ $obat->satuan }}</td>
                        <td>
                            @if ($obat->stokMenipis())
                                <span class="lencana-merah">{{ $obat->stok }}</span>
                            @else
                                {{ $obat->stok }}
                            @endif
                        </td>
                        <td>Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                        <td>{{ $obat->tanggal_kadaluarsa->format('d-m-Y') }}</td>
                        <td class="aksi">
                            <a href="{{ route('obat.edit', $obat) }}">Ubah</a>
                            <form method="POST" action="{{ route('obat.destroy', $obat) }}" onsubmit="return confirm('Hapus obat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tautan-bahaya">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
