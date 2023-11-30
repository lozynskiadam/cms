@extends('layouts.master', [
    'title' => $model->name,
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Lista użytkowników', 'url' => route('users.index')],
        ['label' => $model->name],
    ]
])

@section('content')
    <x-card title="Informacje ogólne" size="4" narrow>
        <table class="table detail-view">
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
    </x-card>
    <x-card size="8">
        <livewire:user-edit-form :user="$model"/>
    </x-card>
@endsection
