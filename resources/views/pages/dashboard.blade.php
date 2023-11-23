@extends('layouts.master', [
    'title' => 'Dashboard',
    'breadcrumbs' => [
        'Strona domowa' => false,
    ]
])

@section('content')
<div class="col-md-5">
    <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title m-0 me-2">
                <h5 class="m-0 me-2">Witaj ponownie, {{ auth()->user()->name }} 👋</h5>
                <small class="text-muted">Data Twojej ostatniej wizyty to 23.11.2023</small>
            </div>
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                <li class="d-flex mb-3 pb-1 align-items-center">
                    <div class="badge bg-label-primary me-3 rounded p-2">
                        <i class="ti ti-wallet ti-sm"></i>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">Wallet</h6>
                            <small class="text-muted d-block">Starbucks</small>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0 text-danger">-$75</h6>
                        </div>
                    </div>
                </li>
                <li class="d-flex mb-3 pb-1 align-items-center">
                    <div class="badge bg-label-success rounded me-3 p-2">
                        <i class="ti ti-browser-check ti-sm"></i>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">Bank Transfer</h6>
                            <small class="text-muted d-block">Add Money</small>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0 text-success">+$480</h6>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
