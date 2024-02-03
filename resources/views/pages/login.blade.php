<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/light.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
    @vite(["resources/js/app.js", "resources/css/app.css"])
    @livewireStyles
    <script src="{{ asset('/assets/js/spark.js') }}" defer></script>
</head>
<body>
<main id="root">
    <div class="card">
        <div class="card-body p-4">
            <div class="text-center sidebar-brand p-3 mb-2" style="scale: 1.2;">
                <i class="fas fa-feather-alt align-middle"></i>
                <span class="align-middle">{{ env('APP_NAME') }}</span>
            </div>

            <form action="" method="post" class="p-3">

                @error('login-error')
                <div class="alert alert-danger">
                    <div class="alert-message">
                        {{ $message }}
                    </div>
                </div>
                @enderror

                @csrf
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control form-control-lg" type="email" name="email" id="email">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control form-control-lg" type="password" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <small>
                        <a href="#">Forgot password?</a>
                    </small>
                </div>
                <div class="mb-4">
                    <div class="form-check align-items-center">
                        <input id="remember-me" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                        <label class="form-check-label" for="remember-me">
                            Remember me for the next time
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary form-control form-control-lg">Sign in</button>
            </form>
        </div>
    </div>
</main>
@livewireScripts
</body>
</html>
