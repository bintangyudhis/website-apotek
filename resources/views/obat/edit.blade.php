@extends('layouts.app')

@section('judul', 'Ubah Obat')

@section('konten')
    <h1>Ubah Obat</h1>
    <p class="subjudul">Perbarui data obat {{ $obat->nama }}.</p>

    <form method="POST" action="{{ route('obat.update', $obat) }}" class="formulir">
        @csrf
        @method('PUT')
        @include('obat._form')
        <div class="formulir-aksi">
            <button type="submit" class="tombol">Simpan Perubahan</button>
            <a href="{{ route('obat.index') }}">Batal</a>
        </div>
    </form>
@endsection
