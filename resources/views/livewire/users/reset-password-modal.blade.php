@if(is_null($newPassword))
    <form wire:submit="submit">
        Czy na pewno zresetować hasło użytkownika o nazwie {{ $user->name }}?
        <div class="modal-buttons">
            <button type="submit" class="btn btn-primary">Resetuj</button>
        </div>
    </form>
@else
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nowe hasło:</span>
        <input type="text" class="form-control" value="{{ $newPassword }}" readonly>
    </div>
    <div class="modal-buttons">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Zamknij</button>
    </div>
@endif
