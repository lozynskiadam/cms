@extends('layouts.master', [
    'title' => 'Użytkownicy',
    'breadcrumbs' => [
        'Strona domowa' => route('dashboard'),
        'Lista użytkowników' => false,
    ]
])

@section('content')
    <div class="col-lg-12">
        <livewire:user-table/>
    </div>
@endsection
