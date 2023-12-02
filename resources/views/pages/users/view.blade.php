@extends('layouts.master', [
    'title' => $model->name,
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Lista użytkowników', 'url' => route('users.index')],
        ['label' => $model->name],
    ]
])

@section('content')
    <x-card size="4" narrow>
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
            <button type="button" class="btn btn-primary mx-1">Edytuj</button>
            <button type="button" class="btn btn-danger mx-1">Usuń</button>
        </div>
    </x-card>
    <x-column size="8">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <i class="fa fa-calendar me-1"></i> Aktywność
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <i class="fa fa-key me-1"></i> Bezpieczeństwo
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                    <i class="fa fa-history me-1"></i> Historia logowań
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <x-card>
                    <livewire:user-edit-form :user="$model"/>
                </x-card>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <x-card>
                    2
                </x-card>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <x-card>
                    3
                </x-card>
            </div>
        </div>
    </x-column>
@endsection
