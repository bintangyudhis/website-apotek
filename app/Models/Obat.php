<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Obat extends Model
{
    public const BATAS_STOK_MENIPIS = 10;

    protected $fillable = [
        'kategori_id',
        'nama',
        'satuan',
        'stok',
        'harga',
        'tanggal_kadaluarsa',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_kadaluarsa' => 'date',
            'stok' => 'integer',
            'harga' => 'integer',
        ];
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function stokMenipis(): bool
    {
        return $this->stok < self::BATAS_STOK_MENIPIS;
    }
}
