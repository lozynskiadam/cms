<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/modern.css') }}">
    <script src="{{ asset('/assets/js/app.js') }}" defer></script>
</head>
<body>
<div id="root">
    <form action="" method="post">
        @csrf

        <label>
            Email
            <input type="text" name="email" class="form-control">
        </label>
        <label>
            Password
            <input type="text" name="password" class="form-control">
        </label>

        <button class="btn btn-primary" type="submit">Login</button>
    </form>
</div>
</body>
</html>
