<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Dashboard') - Website Apotek</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="topbar">
        <div class="container topbar-isi">
            <a class="merek" href="{{ route('dashboard') }}">Website Apotek</a>
            <nav class="navigasi">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'aktif' : '' }}">Dashboard</a>
                <a href="{{ route('obat.index') }}" class="{{ request()->routeIs('obat.*') ? 'aktif' : '' }}">Obat</a>
                <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'aktif' : '' }}">Kategori</a>
            </nav>
        </div>
    </header>

    <main class="container konten">
        @if (session('sukses'))
            <div class="pesan-sukses">{{ session('sukses') }}</div>
        @endif

        @yield('konten')
    </main>

    <footer class="container kaki">
        <p>Website Apotek. Pengelolaan data obat dan kategori untuk kebutuhan internal.</p>
    </footer>
</body>
</html>
