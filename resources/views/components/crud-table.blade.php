<div>
    <form wire:submit.prevent="save">
        @foreach ($fields as $name => $label)
            <div class="mb-2">
                <label>{{ $label }}</label>
                <input type="text" wire:model.defer="form.{{ $name }}" class="form-control">
                @error("form.$name") <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">
            {{ $editingId ? 'Update' : 'Create' }}
        </button>
    </form>

    <hr>

    <table class="table">
        <thead>
            <tr>
                @foreach ($fields as $label)
                    <th>{{ $label }}</th>
                @endforeach
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $item)
                <tr>
                    @foreach (array_keys($fields) as $key)
                        <td>{{ $item->$key }}</td>
                    @endforeach
                    <td>
                        <button wire:click="edit({{ $item->id }})" class="btn btn-sm btn-warning">Edit</button>
                        <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
