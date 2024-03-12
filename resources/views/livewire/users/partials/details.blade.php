<div>
    <div class="text-center p-4">
        <h3 class="mb-0">{{ $user->name }}</h3>
        @unless($user->getRoleNames()->isEmpty())
            <div class="mt-2">
                @foreach($user->getRoleNames() as $role)
                    <span class='badge bg-label-primary'>{{ $role }}</span>
                @endforeach
            </div>
        @endunless
    </div>

    <table class="table detail-view">
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{!! $user->status->render() !!}</td>
        </tr>
        <tr>
            <th>Data utworzenia</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>Data ostatniej aktywności</th>
            <td>{{ $user->last_active_at }}</td>
        </tr>
        <tr>
            <th>Data ostatniej modyfikacji</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
    </table>

    <div class="text-center p-4">
        <button class="btn btn-primary" onclick="Livewire.modal.open('users.components.edit-modal', {user: {{ $user->id }} })">Edytuj</button>
        <button class="btn btn-danger" onclick="Livewire.modal.open('users.components.delete-modal', {user: {{ $user->id }} })">Usuń</button>
    </div>

    <livewire:users.components.edit-modal/>
    <livewire:users.components.delete-modal/>
</div>
