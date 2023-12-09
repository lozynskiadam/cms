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
    </x-card>
    <x-tabs size="8">
        <x-tab title="Aktywność" icon="fa fa-calendar" active="true">
            @include('pages.users.partials.activity')
        </x-tab>
        <x-tab title="Bezpieczeństwo" icon="fa fa-key">
            <livewire:user-edit-form :user="$model"/>
        </x-tab>
        <x-tab title="Historia logowań" icon="fa fa-history">
            @include('pages.users.partials.login-history')
        </x-tab>
    </x-tabs>
@endsection
