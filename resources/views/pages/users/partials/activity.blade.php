<x-card size="12">
    <div class="timeline" id="timeline-6580660d7674f">
        <div class="timeline-event mx-4">
            <form action="/event/event-crud/comment?modelId=32&amp;modelClassId=18&amp;redirect=%2Fshop%2Forder-crud%2Fview%3Fid%3D32" method="POST">
                <input type="hidden" name="_csrf-backend" value="n6cRGAWizcrzonG_rpQYjgjtRxgmtgOWQWN_Vb7DbvPH00V1X8uVvrHPMMbe32vKepohLGqPacUrGQU_36EJww==">                <small class="text-muted mb-1">Dodaj uwagę (użytkownicy aplikacji jej nie zobaczą)</small>
                <textarea name="content" rows="2" class="timeline-event-input form-control mt-2 p-2"></textarea>
                <button type="submit" class="btn btn-primary btn-sm mt-1 rounded act-save" style="display: none;">Zapisz</button>
            </form>
        </div>
        @if ($model->email_verified_at)
            <div class="timeline-event mx-4 severity-info">
                <small class="text-muted mb-1">{{ $model->email_verified_at->format('d M Y H:i') }}</small>
                <p class="mb-0"><span class="timeline-event-title">Potwierdzenie adresu mailowego</span></p>
            </div>
        @endif
        <div class="timeline-event mx-4 severity-info">
            <small class="text-muted mb-1">{{ $model->created_at->format('d M Y H:i') }}</small>
            <p class="mb-0"><span class="timeline-event-title">Utworzenie użytkownika</span></p>
        </div>
    </div>
</x-card>
