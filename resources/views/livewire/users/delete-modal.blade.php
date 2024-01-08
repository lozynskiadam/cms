<x-modal title="Usuń" :id="$this::getModalId()" size="sm">
    <form wire:submit="submit">
        Czy na pewno usunąć tego użytkownika?
        <div class="modal-buttons">
            <button type="submit" class="btn btn-danger">Usuń</button>
        </div>
    </form>
</x-modal>
