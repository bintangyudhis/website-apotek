@extends('layouts.app')

@section('judul', 'Kategori Obat')

@section('konten')
    <div class="judul-baris">
        <div>
            <h1>Kategori Obat</h1>
            <p class="subjudul">Daftar kategori beserta jumlah obat di dalamnya.</p>
        </div>
        <a class="tombol" href="{{ route('kategori.create') }}">Tambah Kategori</a>
    </div>

    @if ($kategoris->isEmpty())
        <p>Belum ada kategori. Tambahkan kategori pertama lewat tombol di atas.</p>
    @else
        <table class="tabel">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Jumlah obat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->deskripsi ?? '-' }}</td>
                        <td>{{ $kategori->obats_count }}</td>
                        <td class="aksi">
                            <a href="{{ route('kategori.edit', $kategori) }}">Ubah</a>
                            <form method="POST" action="{{ route('kategori.destroy', $kategori) }}" onsubmit="return confirm('Hapus kategori ini beserta obat di dalamnya?')">
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
