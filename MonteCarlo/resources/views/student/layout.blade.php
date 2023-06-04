<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/site.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img class="my-2" alt="Monte Carlo" src="{{ asset('img/logo-nobg.png') }}" height="25" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.schedule') }}">Harmonogram</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.materials') }}">Materiały dydaktyczne</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.test') }}">Testy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.profile') }}">Moje dane</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.opinion') }}">Opinia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.chat') }}">Czat</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-0">
                    @if (auth()->check())
                        <span class="navbar-text fw-bold">
                            {{ auth()->user()->name }} {{ auth()->user()->surname }},
                        </span>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Wyloguj się</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.login') }}">Zaloguj się</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="admin-bg-grad p-2">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
