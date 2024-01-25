<form wire:submit="submit">
    Czy na pewno usunąć użytkownika o nazwie {{ $user->name }}?
    <div class="modal-buttons">
        <button type="submit" class="btn btn-danger">Usuń</button>
    </div>
</form>
