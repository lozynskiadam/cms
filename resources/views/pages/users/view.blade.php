@extends('layouts.master', [
    'title' => $model->name,
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Lista użytkowników', 'url' => route('users.index')],
        ['label' => $model->name],
    ]
])

@section('content')
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h5 class="card-title">Informacje ogólne</h5></div>
            <table class="table table-striped table-bordered detail-view">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $model->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $model->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $model->email }}</td>
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
        </div>
    </div>
@endsection
