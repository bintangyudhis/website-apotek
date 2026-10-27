@extends('layouts.app')

@section('judul', 'Tambah Kategori')

@section('konten')
    <h1>Tambah Kategori</h1>
    <p class="subjudul">Isi nama kategori dan deskripsi singkatnya.</p>

    <form method="POST" action="{{ route('kategori.store') }}" class="formulir">
        @csrf
        @include('kategori._form')
        <div class="formulir-aksi">
            <button type="submit" class="tombol">Simpan</button>
            <a href="{{ route('kategori.index') }}">Batal</a>
        </div>
    </form>
@endsection
