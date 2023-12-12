<div class="text-center p-4">
    <h3 class="mb-0">{{ $model->name }} <small class="text-muted">#{{ $model->id }}</small></h3>
</div>
<table class="table detail-view">
    <tbody>
    <tr>
        <th>Email</th>
        <td>{{ $model->email }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{!! $model->status->render() !!}</td>
    </tr>
    <tr>
        <th>Mail potwierdzony dnia</th>
        <td>{{ $model->email_verified_at }}</td>
    </tr>
    <tr>
        <th>Data utworzenia</th>
        <td>{{ $model->created_at }}</td>
    </tr>
    <tr>
        <th>Data ostatniej modyfikacji</th>
        <td>{{ $model->updated_at }}</td>
    </tr>
    </tbody>
</table>
<div class="text-center p-4">
    <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Edytuj</button>
    <button type="button" class="btn btn-danger mx-1">Usuń</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edytuj</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:user-edit-form :user="$model"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Zapisz</button>
            </div>
        </div>
    </div>
</div>
