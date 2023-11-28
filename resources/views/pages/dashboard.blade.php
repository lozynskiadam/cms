@extends('layouts.master', [
    'title' => 'Dashboard',
    'breadcrumbs' => [
        ['label' => 'Strona domowa'],
    ]
])

@section('content')
<x-card
    title="Witaj ponownie, {{ auth()->user()->name }} 👋"
    subtitle="Data Twojej ostatniej wizyty to 23.11.2023"
    size="5"
>
    Lorem ipsum
</x-card>
@endsection
