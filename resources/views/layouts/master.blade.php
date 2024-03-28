<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ (isset($title) ? "$title - " : '') . config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.1.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/light.css') }}" id="theme">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
    @vite(["resources/js/app.js", "resources/css/app.css"])
    @livewireStyles
    <script src="{{ asset('/assets/js/spark.js') }}" defer></script>
    <script src="{{ asset('/assets/js/custom.js') }}" defer></script>
</head>
<body>
<div id="root">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content">
                <a class="sidebar-brand" href="/">
                    <i class="fas fa-feather-alt align-middle"></i>
                    <span class="align-middle">{{ config('app.name') }}</span>
                </a>
                <x-menu/>
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-theme">
                <a class="sidebar-toggle me-2">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div class="d-none d-md-flex nav-search-bar">
                    <i class="ti ti-search"></i>
                    <span>Przeszukaj aplikację...</span>
                </div>
                <div class="d-none d-md-inline-block">
                </div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-icon nav-link d-flex px-1 pe-0">
                            <span class="badge bg-label-danger" style="align-items: center; display: flex; margin: 0.25rem; padding: 0 0.5rem; font-size: 0.85rem;">
                                <i class="ti ti-alert-triangle" style="font-size: 1.25rem; line-height: 2rem; margin-right: 5px;"></i>
                                <span>31</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-icon nav-link d-flex ps-0 px-1">
                            <span class="badge bg-label-success" style="align-items: center; display: flex; margin: 0.25rem; padding: 0 0.5rem; font-size: 0.85rem;">
                                <i class="ti ti-crane" style="font-size: 1.25rem; line-height: 2rem; margin-right: 5px;"></i>
                                <span>28.03.2024</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-icon nav-link toggle-theme d-flex ps-2 pe-1">
                            <i class="ti ti-moon" style="line-height: 2.5rem; font-size: 1.5rem"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-icon nav-link d-flex ps-2 pe-1">
                            <i class="ti ti-shield-chevron" style="line-height: 2.5rem; font-size: 1.5rem"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="http://champ.dev.alterpage.pl" target="_blank" class="nav-icon nav-link d-flex ps-2 pe-1">
                            <i class="ti ti-world-www" style="line-height: 2.5rem; font-size: 1.5rem"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-1 dropdown">
                        <a class="nav-link dropdown-toggle position-relative d-flex" href="#" id="user-dropdown" data-bs-toggle="dropdown">
                            <img src="{{ asset('/assets/images/no-avatar.png') }}" class="rounded-circle" style="height: 2.5rem; padding: 0.2rem;">
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
                                @foreach($breadcrumbs ?? [] as $breadcrumb)
                                    @empty($breadcrumb['url'])
                                        <li class="breadcrumb-item active">{{ $breadcrumb['label'] }}</li>
                                    @else
                                        <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a></li>
                                    @endempty
                                @endforeach
                            </ol>
                        </nav>
                        <div class="buttons-container">
                            @foreach($buttons ?? [] as $button)
                                @if (!($button['attributes']['class'] ?? false))
                                    @php
                                        $button['attributes']['class'] = 'btn btn-primary'
                                    @endphp
                                @endif
                                @if ($button['modal'] ?? false)
                                    @php
                                        $button['attributes']['onclick'] = "Livewire.modal.open('{$button['modal']}')";
                                    @endphp
                                @endif
                                @if ($button['dispatch'] ?? false)
                                    @php
                                        $button['attributes']['onclick'] = "Livewire.dispatch('{$button['dispatch']}')";
                                    @endphp
                                @endif
                                @if ($button['url'] ?? false)
                                    <form action="{{ $button['url'] }}" method="{{ $button['method'] ?? 'GET' }}">
                                    @csrf
                                @endif
                                    <button
                                        @foreach($button['attributes'] ?? [] as $attr => $value)
                                            {{ $attr }}="{{ $value }}"
                                        @endforeach
                                    >
                                        {{ $button['label'] ?? '' }}
                                    </button>
                                @if ($button['url'] ?? false)
                                    </form>
                                @endif
                            @endforeach
                        </div>
                        <div class="alerts-container">
                            @foreach(\App\Services\Alert::getAlerts() as $type => $messages)
                                <div class="alert alert-{{ $type }} alert-dismissible" role="alert">
                                    <div class="alert-icon">
                                        <i class="far fa-fw fa-bell"></i>
                                    </div>
                                    <div class="alert-message">
                                        @if (count($messages) > 1)
                                            <ul class="mb-0">
                                        @endif
                                        @foreach($messages as $message)
                                            @if (count($messages) > 1) <li> @endif
                                            {{ $message }}
                                            @if (count($messages) > 1) </li> @endif
                                        @endforeach
                                        @if (count($messages) > 1)
                                            </ul>
                                        @endif
                                    </div>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="content-container" class="position-relative row">
                        @yield('content')
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="text-muted text-center">
                        <a href="#">✨infirsoft</a> © {{ env('APP_NAME') }} {{ date('Y') }}
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<div id="modals">
    <livewire:confirmation/>
</div>
@livewireScripts
</body>
</html>
