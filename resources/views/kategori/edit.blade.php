@extends('layouts.app')

@section('judul', 'Ubah Kategori')

@section('konten')
    <h1>Ubah Kategori</h1>
    <p class="subjudul">Perbarui nama atau deskripsi kategori.</p>

    <form method="POST" action="{{ route('kategori.update', $kategori) }}" class="formulir">
        @csrf
        @method('PUT')
        @include('kategori._form')
        <div class="formulir-aksi">
            <button type="submit" class="tombol">Simpan Perubahan</button>
            <a href="{{ route('kategori.index') }}">Batal</a>
        </div>
    </form>
@endsection
