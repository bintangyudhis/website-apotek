<div class="kolom">
    <label for="nama">Nama kategori</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama', $kategori->nama ?? '') }}" required>
    @error('nama') <p class="galat">{{ $message }}</p> @enderror
</div>

<div class="kolom">
    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
    @error('deskripsi') <p class="galat">{{ $message }}</p> @enderror
</div>
