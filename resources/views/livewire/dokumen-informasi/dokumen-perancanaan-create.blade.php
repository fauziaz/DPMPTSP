<div class="container my-4">
    <div class="card p-4 shadow-sm">
        <h4 class="mb-3">Tambah Perencanaan</h4>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" wire:model="judul" class="form-control">
                @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea wire:model="deskripsi" class="form-control"></textarea>
                @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" wire:model="tahun" class="form-control">
                    @error('tahun') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Publikasi</label>
                    <input type="date" wire:model="tanggal" class="form-control">
                    @error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload File (PDF/DOC/XLS)</label>
                <input type="file" wire:model="file" class="form-control">
                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="text-center my-2">
                <strong>Atau</strong>
            </div>

            <div class="mb-3">
                <label class="form-label">Masukkan URL File (opsional)</label>
                <input type="url" wire:model="fileUrl" placeholder="https://example.com/file.pdf" class="form-control">
                @error('fileUrl') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tag (Opsional)</label>
                <input type="text" wire:model="tag" class="form-control">
                @error('tag') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan
            </button>
        </form>
    </div>
</div>
