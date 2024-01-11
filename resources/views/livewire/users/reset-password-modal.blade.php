<x-modal title="Resetuj hasło" :id="$this->getModalId()" size="sm">

    @unless($initialized)
        <div class="text-center">
            <i class="fa fa-sync-alt fa-3x fa-spin"></i>
        </div>
    @endunless

    @if($initialized)
        @if($newPassword)
            <div class="alert alert-success">
                <div class="alert-icon"><i class="fas fa-check"></i></div>
                <div class="alert-message">Hasło zostało zmienione</div>
            </div>
            <div class="text-center">
                Nowe hasło użytkownika:
                <input type="text" class="form-control" readonly value="{{ $newPassword }}" />
            </div>
            <div class="modal-buttons">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Zamknij</button>
            </div>
        @else
            <form wire:submit="submit">
                Czy na pewno zresetować hasło użytkownika o nazwie {{ $user->name }}?
                <div class="modal-buttons">
                    <button type="submit" class="btn btn-primary">Resetuj</button>
                </div>
            </form>
        @endif
    @endif

</x-modal>
