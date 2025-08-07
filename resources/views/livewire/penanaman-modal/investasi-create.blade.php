<div>
    <form wire:submit.prevent="save">
        <!-- Input kategori -->
        <div class="mb-3">
            <label>Kategori</label>
            <select wire:model="kategori" class="form-select">
                <option value="">-- Pilih Kategori --</option>
                <option value="potensi">Potensi Investasi</option>
                <option value="promosi">Promosi Investasi</option>
                <option value="realisasi">Realisasi Investasi</option>
            </select>
            @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Input lainnya -->
        <!-- judul, deskripsi, tahun, tanggal, file/fileUrl, tag seperti biasa -->
        
        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif
</div>
