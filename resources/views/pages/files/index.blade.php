@extends('layouts.master', [
    'title' => 'Pliki',
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Pliki'],
    ],
    'buttons' => [
        ['label' => 'Generuj', 'dispatch' => 'factory'],
    ]
])

@section('content')
    <div class="col-lg-12">
        <livewire:files.listing/>
    </div>
@endsection
