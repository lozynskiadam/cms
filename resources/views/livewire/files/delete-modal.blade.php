<form wire:submit="submit">
    Czy na pewno usunąć plik o nazwie {{ $file->name }}?
    <div class="modal-buttons">
        <button type="submit" class="btn btn-danger">Usuń</button>
    </div>
</form>
