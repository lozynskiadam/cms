<div>
    <div class="text-center p-4">
        <h3 class="mb-0">
            {{ $user->name }} <small class="badge badge-info rounded-pill text-muted">#{{ $user->id }}</small>
        </h3>

        @unless($user->getRoleNames()->isEmpty())
            <div class="mt-2">
                @foreach($user->getRoleNames() as $role)
                    <span class='badge badge-primary'>{{ $role }}</span>
                @endforeach
            </div>
        @endunless
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
            <th>Data ostatniej aktywności</th>
            <td>{{ $user->last_active_at }}</td>
        </tr>
        <tr>
            <th>Data ostatniej modyfikacji</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
        </tbody>
    </table>

    <div class="text-center p-4">
        <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#user-edit-modal">
            Edytuj
        </button>
        <button type="button" class="btn btn-danger" onclick="Livewire.dispatch('confirm', {
            url: '{{ route('users.delete', ['user' => $user->id]) }}',
            message: 'Czy na pewno chcesz usunąć tego użytkownika?',
            submitLabel: 'Usuń'
        })">Usuń
        </button>
    </div>

    <x-modal title="Edytuj" id="user-edit-modal">
        <form wire:submit="update">
            <x-inputs.text label="Nazwa" field="name"/>
            <x-inputs.text label="Email" field="email"/>
            <x-inputs.select label="Status" field="status" :options="\App\Enums\UserStatus::cases()"/>
            <x-inputs.checkbox-list label="Role" field="roles" :options="\App\Enums\UserRole::cases() "/>

            <div class="modal-buttons">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
    </x-modal>
</div>
