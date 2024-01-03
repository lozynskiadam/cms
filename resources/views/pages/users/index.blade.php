@extends('layouts.master', [
    'title' => 'Użytkownicy',
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Użytkownicy'],
    ],
    'buttons' => [
        ['label' => 'Dodaj'],
        ['label' => 'Generuj', 'dispatch' => 'factory'],
    ]
])

@section('content')
    <livewire:users.listing/>
@endsection
