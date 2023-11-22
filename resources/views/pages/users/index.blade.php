@extends('layouts.master', [
    'title' => 'Użytkownicy',
    'breadcrumbs' => [
        'Strona domowa' => '/',
        'Lista użytkowników' => false,
    ]
])

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Lista użytkowników</h5>
            </div>
            <livewire:user-table/>
        </div>
    </div>
@endsection
