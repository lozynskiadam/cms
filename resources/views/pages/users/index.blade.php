@extends('layouts.master', [
    'title' => 'Użytkownicy',
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Lista użytkowników'],
    ],
    'buttons' => [
        ['label' => 'Generuj', 'dispatch' => 'factory'],
    ]
])

@section('content')
    <div class="col-lg-12">
        <livewire:user-list-table/>
    </div>
@endsection
