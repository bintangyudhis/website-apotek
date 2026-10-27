<div class="kolom">
    <label for="nama">Nama obat</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama', $obat->nama ?? '') }}" required>
    @error('nama') <p class="galat">{{ $message }}</p> @enderror
</div>

<div class="kolom">
    <label for="kategori_id">Kategori</label>
    <select id="kategori_id" name="kategori_id" required>
        <option value="">Pilih kategori</option>
        @foreach ($kategoris as $kategori)
            <option value="{{ $kategori->id }}" @selected(old('kategori_id', $obat->kategori_id ?? '') == $kategori->id)>{{ $kategori->nama }}</option>
        @endforeach
    </select>
    @error('kategori_id') <p class="galat">{{ $message }}</p> @enderror
</div>

<div class="kolom">
    <label for="satuan">Satuan</label>
    <input type="text" id="satuan" name="satuan" list="daftar-satuan" value="{{ old('satuan', $obat->satuan ?? '') }}" placeholder="tablet, botol, strip, dan sejenisnya" required>
    <datalist id="daftar-satuan">
        <option value="tablet">
        <option value="kapsul">
        <option value="botol">
        <option value="strip">
        <option value="sachet">
        <option value="tube">
    </datalist>
    @error('satuan') <p class="galat">{{ $message }}</p> @enderror
</div>

<div class="kolom-baris">
    <div class="kolom">
        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" min="0" value="{{ old('stok', $obat->stok ?? '') }}" required>
        @error('stok') <p class="galat">{{ $message }}</p> @enderror
    </div>

    <div class="kolom">
        <label for="harga">Harga (Rp)</label>
        <input type="number" id="harga" name="harga" min="0" value="{{ old('harga', $obat->harga ?? '') }}" required>
        @error('harga') <p class="galat">{{ $message }}</p> @enderror
    </div>
</div>

<div class="kolom">
    <label for="tanggal_kadaluarsa">Tanggal kadaluarsa</label>
    <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa', isset($obat) ? $obat->tanggal_kadaluarsa->format('Y-m-d') : '') }}" required>
    @error('tanggal_kadaluarsa') <p class="galat">{{ $message }}</p> @enderror
</div>
