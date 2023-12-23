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
    <div class="col-lg-12">
        <livewire:files.listing/>
        <livewire:files.upload-modal/>
    </div>
@endsection
