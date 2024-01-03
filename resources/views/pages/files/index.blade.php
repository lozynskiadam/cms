@extends('layouts.master', [
    'title' => 'Pliki',
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Pliki'],
    ],
    'buttons' => [
        ['label' => 'Wgraj', 'modal' => '#file-upload-modal'],
        ['label' => 'Generuj', 'dispatch' => 'factory'],
    ]
])

@section('content')
    <livewire:files.listing/>
    <livewire:files.upload-modal/>
@endsection
