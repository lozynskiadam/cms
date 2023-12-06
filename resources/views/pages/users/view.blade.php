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
        @include('pages.users.partials.overview')
        <livewire:user-edit-form :user="$model"/>
    </x-card>
    <x-tabs size="8" :tabs="[
        [
            'title' => 'Aktywność',
            'icon' => 'fa fa-calendar',
            'view' => 'pages.users.partials.activity',
            'active' => true,
        ],
        [
            'title' => 'Bezpieczeństwo',
            'icon' => 'fa fa-key',
            'view' => 'pages.users.partials.security',
        ],
        [
            'title' => 'Historia logowań',
            'icon' => 'fa fa-history',
            'view' => 'pages.users.partials.login-history',
        ]
    ]"/>
@endsection
