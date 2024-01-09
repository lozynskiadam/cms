<x-modal title="Wgraj plik" :id="$this->getModalId()" size="sm">
    <form wire:submit="submit">
        <input type="file" wire:model="file">
        @error('file') {{ $message }} @enderror
        <div class="modal-buttons">
            <button type="submit" class="btn btn-primary">Wgraj</button>
        </div>
    </form>
</x-modal>
