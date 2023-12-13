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
        <button type="button" class="btn btn-danger mx-1">Usuń</button>
    </div>

    <x-modal title="Edytuj" id="user-edit-modal">
        <livewire:user-edit-form :user="$user"/>
    </x-modal>
</div>
