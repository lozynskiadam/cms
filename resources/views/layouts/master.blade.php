<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/modern.css') }}">
    @livewireStyles
</head>
<body>
<div id="root">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content">
                <a class="sidebar-brand" href="/">
                    <i class="fas fa-feather-alt align-middle me-1 fs-2"></i>
                    <span class="align-middle">{{ env('APP_NAME') }}</span>
                </a>
                <div class="sidebar-user">
                    <img src="https://avatars.githubusercontent.com/u/58483602?v=4" class="img-fluid rounded-circle mb-2" alt="avatar">
                    <div class="font-weight-bold">{{ auth()->user()->name }}</div>
                    <small>{{ auth()->user()->email }}</small>
                </div>
                <x-menu/>
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-theme">
                <a class="sidebar-toggle d-flex me-2">
                    <i class="hamburger align-self-center"></i>
                </a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-1">
                        <a class="nav-icon nav-link" href="http://champ.dev.alterpage.pl" target="_blank">
                            <i class="fa fa-earth"></i>
                            <span class="d-none d-md-inline-block">WebSite</span>
                        </a>
                    </li>
                    <li class="nav-item ms-1 dropdown">
                        <a class="nav-link dropdown-toggle position-relative" href="#" id="user-dropdown" data-bs-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="d-none d-md-inline-block">{{ auth()->user()->email }}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="user-dropdown">
                            <a class="dropdown-item" href="/user/password/change">
                                <i class="align-middle me-1 fas fa-fw fa-user-lock"></i> Zmiana hasła
                            </a>
                            <a class="dropdown-item" href="/logout" data-method="post">
                                <i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Wyloguj
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="header">
                        <h1 class="header-title">{{ $title ?? '' }}</h1>
                        <nav class="breadcrumbs-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @foreach($breadcrumbs ?? [] as $label => $url)
                                    @empty($url)
                                        <li class="breadcrumb-item active">{{ $label }}</li>
                                    @else
                                        <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
                                    @endempty
                                @endforeach
                            </ol>
                        </nav>
                        <div class="buttons-container"></div>
                        <div class="alerts-container"></div>

                    </div>
                    <div id="content-container" class="position-relative row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/assets/js/app.js') }}" defer></script>
@livewireScripts
</body>
</html>
