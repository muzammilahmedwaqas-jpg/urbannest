<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'UrbanNest') }}</title>

        <!-- Bootstrap 5 CSS & Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-5 px-3">
            <div class="text-center mb-4">
                <a href="/" class="text-decoration-none">
                    <span class="fs-2 fw-bold text-dark">UrbanNest</span>
                </a>
            </div>

            <div class="card shadow-sm border-0 w-100" style="max-width: 440px;">
                <div class="card-body p-4 p-sm-5">
                    {{ $slot }}
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="/" class="text-muted text-decoration-none small">&larr; Back to Home</a>
            </div>
        </div>

        <!-- Bootstrap 5 Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
