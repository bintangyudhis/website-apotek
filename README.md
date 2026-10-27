# Website Apotek

Kerangka awal website apotek berbasis Laravel 12. Repositori ini baru berisi struktur dasar proyek Laravel dan halaman sambutan bawaan. Fitur apotek seperti katalog obat dan transaksi belum dibuat.

## Fitur

- Struktur proyek Laravel 12 yang siap dikembangkan
- Halaman sambutan bawaan Laravel pada route `/`
- Migration dasar untuk tabel users, cache, dan jobs

## Teknologi

- PHP 8.2 atau lebih baru
- Laravel 12
- Blade
- Vite dan Tailwind CSS 4 untuk aset frontend
- SQLite sebagai database bawaan

## Cara Instalasi

Prasyarat:

- PHP 8.2 atau lebih baru
- Composer
- Node.js dan npm

Langkah instalasi:

```bash
git clone https://github.com/bintangyudhis/website-apotek.git
cd website-apotek
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

## Cara Menjalankan

Jalankan server pengembangan Laravel:

```bash
php artisan serve
```

Buka `http://localhost:8000` di browser untuk melihat halaman sambutan.

## Lisensi

Proyek ini memakai lisensi MIT. Lihat berkas [LICENSE](LICENSE) untuk teks lengkapnya.
