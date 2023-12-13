<div>
    <div class="text-center p-4">
        <h3 class="mb-0">{{ $user->name }} <small class="text-muted">#{{ $user->id }}</small></h3>
    </div>

    <table class="table detail-view">
        <tbody>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{!! $user->status->render() !!}</td>
        </tr>
        <tr>
            <th>Mail potwierdzony dnia</th>
            <td>{{ $user->email_verified_at }}</td>
        </tr>
        <tr>
            <th>Data utworzenia</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>Data ostatniej modyfikacji</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
        </tbody>
    </table>

    <div class="text-center p-4">
        <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#user-edit-modal">Edytuj</button>
        <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#user-delete-modal">Usuń</button>
    </div>

    <x-modal title="Edytuj" id="user-edit-modal">
        <form wire:submit="update">
            <x-input label="Nazwa" field="user.name" value="{{ $user->name }}"/>
            <x-input label="Email" field="user.email" value="{{ $user->email }}"/>
            <x-select label="Status" field="user.status" value="{{ $user->status }}" :options="\App\Enums\UserStatus::cases()"/>
            <div class="modal-buttons">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
    </x-modal>

    <x-confirm id="user-delete-modal" :route="route('users.delete', ['user' => $user->id])"/>
</div>
