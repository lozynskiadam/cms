<x-modal title="Wgraj plik" id="file-upload-modal">
    <form wire:submit="update">
        <input type="file" wire:model="file">
        @error('file') {{ $message }} @enderror
        <div class="modal-buttons">
            <button type="submit" class="btn btn-primary">Wgraj</button>
        </div>
    </form>
</x-modal>
