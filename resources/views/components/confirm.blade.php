@teleport('#modals')
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">Potwierdzenie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ $route }}" method="{{ $method ?? 'POST' }}">
                    @csrf
                    Czy na pewno chcesz wykonać tą akcję?
                    <div class="modal-buttons">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Wróć</button>
                        <button type="submit" class="btn btn-primary">{{ $buttonLabel ?? 'Wykonaj' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endteleport
