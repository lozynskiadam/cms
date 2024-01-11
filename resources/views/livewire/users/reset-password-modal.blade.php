@if(is_null($newPassword))
    <form wire:submit="submit">
        Czy na pewno zresetować hasło użytkownika o nazwie {{ $user->name }}?
        <div class="modal-buttons">
            <button type="submit" class="btn btn-primary">Resetuj</button>
        </div>
    </form>
@else
    <div class="alert alert-success">
        <div class="alert-icon"><i class="fas fa-check"></i></div>
        <div class="alert-message">Hasło zostało zmienione</div>
    </div>
    <div class="text-center">
        Nowe hasło użytkownika:
        <input type="text" class="form-control" readonly value="{{ $newPassword }}"/>
    </div>
    <div class="modal-buttons">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Zamknij</button>
    </div>
@endif
