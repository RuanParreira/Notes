<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row mb-3 align-items-center">
            <div class="col">
                <img src="assets/images/logo.png" alt="Notes logo">
            </div>
            <div class="col text-center">
                A simple <span class="text-warning">Laravel</span> project!
            </div>
            <div class="col">
                <div class="d-flex justify-content-end align-items-center">
                    <span class="me-3"><i
                            class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i>{{ $user->name }}</span>
                    <a href="{{ route('auth.logout') }}" class="btn btn-outline-secondary px-3">
                        Logout<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>
        @yield('content')
    </div>

    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
