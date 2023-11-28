@extends('layouts.master', [
    'title' => 'Użytkownicy',
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Lista użytkowników'],
    ],
    'buttons' => [
        ['label' => 'Dodaj', 'url' => route('users.factory'), 'method' => 'POST'],
    ]
])

@section('content')
    <div class="col-lg-12">
        <livewire:user-table/>
    </div>
@endsection
