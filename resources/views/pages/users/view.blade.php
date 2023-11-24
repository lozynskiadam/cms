@extends('layouts.master', [
    'title' => $model->name,
    'breadcrumbs' => [
        ['label' => 'Strona domowa', 'url' => route('dashboard')],
        ['label' => 'Lista użytkowników', 'url' => route('users.index')],
        ['label' => $model->name],
    ]
])

@section('content')
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h5 class="card-title">Informacje ogólne</h5></div>
            <table id="w0" class="table table-striped table-bordered detail-view">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>1</td>
                </tr>
                <tr>
                    <th>Klient</th>
                    <td><span class="not-set">(brak wartości)</span></td>
                </tr>
                <tr>
                    <th>Treść</th>
                    <td>Czy potrzebujesz pomocy w uzyskaniu pozwolenia o pracę w lokalizacji, w której obecnie szukasz
                        zatrudnienia?
                    </td>
                </tr>
                <tr>
                    <th>Znaczenie biznesowe</th>
                    <td>Pozwolenie na pracę</td>
                </tr>
                <tr>
                    <th>Typ odpowiedzi</th>
                    <td>Pojedynczy wybór</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>Aktywne</td>
                </tr>
                <tr>
                    <th>Zmodyfikowano</th>
                    <td>22 wrz 2023, 15:11:55</td>
                </tr>
                <tr>
                    <th>Utworzono</th>
                    <td>22 wrz 2023, 15:11:55</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
