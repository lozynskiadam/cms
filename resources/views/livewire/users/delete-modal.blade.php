<x-modal title="Usuń" :id="$this->getModalId()" size="sm">

    @unless($initialized)
        <div class="text-center">
            <i class="fa fa-sync-alt fa-3x fa-spin"></i>
        </div>
    @endunless

    @if($initialized)
    <form wire:submit="submit">
        Czy na pewno usunąć użytkownika o nazwie {{ $user->name }}?
        <div class="modal-buttons">
            <button type="submit" class="btn btn-danger">Usuń</button>
        </div>
    </form>
    @endif

</x-modal>
