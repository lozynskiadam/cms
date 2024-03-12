<div class="modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="confirm-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="confirm-modal-label">Potwierdzenie</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ $url }}" method="{{ $method }}">
                    @csrf
                    {{ $message }}
                    <div class="modal-buttons">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Wróć</button>
                        <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
