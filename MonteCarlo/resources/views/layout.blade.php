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
                        <a class="nav-link" href="{{ route('home.pricing') }}">Cennik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.about') }}">O nas</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
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
    <div class="container-fluid p-0">
        @yield('content')
    </div>
    <footer class="content py-5 bg-footer">
        <div class="row">
            <div class="col-12 col-md-4">
                <h5>Kontakt:</h5>
                <p class="text-light">tel: +48 765 098 321</p>
                <p class="text-light">tel: +48 900 800 700</p>
                <p class="text-light">e-mail: MonteCarlo@gmail.com</p>
            </div>
            <div class="col-12 col-md-4 text-end">
                <h5>Adres:</h5>
                <p class="text-light">ul. Oleska 2a</p>
                <p class="text-light">46-200 Opole</p>
            </div>
            <div class="col-12 col-md-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2526.63936813429!2d17.9866406!3d50.7080765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4710515815eb0e8f%3A0xd1466e6b3efb7008!2sOleska%202A%2C%2046-045%20Zawada!5e0!3m2!1spl!2spl!4v1681646010013!5m2!1spl!2spl"
                    width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="ms-5"></iframe>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
