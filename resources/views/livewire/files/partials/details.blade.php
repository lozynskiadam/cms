<div>
    <div class="text-center p-4">
        {!! $file->getPreview(width: 100, height: 100) !!}
    </div>
    <table class="table detail-view">
        <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $file->id }}</td>
        </tr>
        <tr>
            <th>Nazwa</th>
            <td>{{ $file->name }}</td>
        </tr>
        <tr>
            <th>Typ</th>
            <td>{{ $file->type }}</td>
        </tr>
        <tr>
            <th>Widoczność</th>
            <td>{{ $file->is_private ? 'prywatny' : 'publiczny' }}</td>
        </tr>
        <tr>
            <th>Rozmiar</th>
            <td>{{ $file->getFormattedSize() }}</td>
        </tr>
        <tr>
            <th>Data utworzenia</th>
            <td>{{ $file->created_at }}</td>
        </tr>
        </tbody>
    </table>

    <div class="text-center p-4">
        <a href="{{ $file->getDownloadUrl() }}" type="button" class="btn btn-primary">Pobierz</a>
        <button type="button" class="btn btn-danger" onclick="Livewire.modal.open('files.delete-modal', {file: {{ $file->id }} })">Usuń</button>
    </div>

    <livewire:files.delete-modal/>
</div>
