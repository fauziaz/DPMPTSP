<div class="container mt-4">
    <h3>Tambah Berita</h3>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input wire:model="judul" type="text" class="form-control" id="judul">
            @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input wire:model="kategori" type="text" class="form-control" id="kategori">
            @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea wire:model="deskripsi" class="form-control" id="deskripsi" rows="4"></textarea>
            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input wire:model="gambar" type="file" class="form-control" id="gambar">
            @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror

            @if ($gambar)
                <div class="mt-2">
                    <img src="{{ $gambar->temporaryUrl() }}" class="img-thumbnail" style="max-height: 200px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input wire:model="penulis" type="text" class="form-control" id="penulis">
            @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>