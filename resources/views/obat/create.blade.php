@extends('layouts.app')

@section('judul', 'Tambah Obat')

@section('konten')
    <h1>Tambah Obat</h1>
    <p class="subjudul">Isi data obat yang akan dicatat.</p>

    <form method="POST" action="{{ route('obat.store') }}" class="formulir">
        @csrf
        @include('obat._form')
        <div class="formulir-aksi">
            <button type="submit" class="tombol">Simpan</button>
            <a href="{{ route('obat.index') }}">Batal</a>
        </div>
    </form>
@endsection
