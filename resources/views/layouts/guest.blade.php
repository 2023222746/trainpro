<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TrainPro LMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Custom CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body>
    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="TrainPro" height="60" class="mb-3">
                        </a>
                        <h4 class="fw-bold text-primary">{{ config('app.name', 'TrainPro LMS') }}</h4>
                    </div>

                    <!-- Auth Card -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4 p-md-5">
                            {{ $slot }}
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="text-center mt-4 text-muted small">
                        &copy; {{ date('Y') }} TrainPro Training & Consultancy.
                        <br>Empowering People • Strengthening Businesses • Driving Growth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
