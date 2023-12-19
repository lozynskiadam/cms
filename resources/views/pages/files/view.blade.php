@extends('layouts.master', [
    'title' => $model->name,
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Pliki', 'url' => route('files.index')],
        ['label' => $model->name],
    ]
])

@section('content')
    <x-card size="4" narrow>
        hello
    </x-card>
    <x-tabs size="8">
        <x-tab title="Aktywność" icon="fa fa-calendar" active="true">
            test
        </x-tab>
    </x-tabs>
@endsection
