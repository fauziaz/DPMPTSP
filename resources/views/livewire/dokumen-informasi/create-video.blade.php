<div>
<div class="card p-4">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <input type="text" wire:model="judul" placeholder="Judul" class="form-control mb-2">
        <textarea wire:model="deskripsi" placeholder="Deskripsi" class="form-control mb-2"></textarea>

        <label>Upload Gambar (opsional):</label>
        <input type="file" wire:model="video" class="form-control mb-2">

        <label>Atau Masukkan URL Gambar:</label>
        <input type="url" wire:model="videoUrl" placeholder="https://example.com/image.jpg" class="form-control mb-2">

        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</div>

</div>
