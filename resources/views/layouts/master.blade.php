<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ (isset($title) ? "$title - " : '') . config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
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
                <a class="sidebar-toggle d-flex me-2">
                    <i class="hamburger align-self-center"></i>
                </a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-1">
                        <a href="#" class="nav-icon nav-link toggle-theme">
                            <i class="fas fa-moon"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-1">
                        <a class="nav-icon nav-link" href="http://champ.dev.alterpage.pl" target="_blank">
                            <i class="fas fa-globe"></i>
                        </a>
                    </li>
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="../../assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="pages-account-settings-account.html">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="../../assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-medium d-block">John Doe</span>
                                            <small class="text-muted">Admin</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="pages-profile-user.html">
                                    <i class="ti ti-user-check me-2 ti-sm"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="pages-account-settings-account.html">
                                    <i class="ti ti-settings me-2 ti-sm"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-help me-2 ti-sm"></i>
                                    <span class="align-middle">FAQ</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                                    <span class="align-middle">Pricing</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" target="_blank">
                                    <i class="ti ti-logout me-2 ti-sm"></i>
                                    <span class="align-middle">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ms-1 dropdown">
                        <a class="nav-link dropdown-toggle position-relative" href="#" id="user-dropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i>
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
