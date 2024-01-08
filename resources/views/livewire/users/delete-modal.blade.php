<x-modal title="Usuń" id="user-delete-modal" size="sm">
    <form wire:submit="delete">
        Czy na pewno usunąć tego użytkownika?
        <div class="modal-buttons">
            <button type="submit" class="btn btn-danger">Usuń</button>
        </div>
    </form>
</x-modal>
