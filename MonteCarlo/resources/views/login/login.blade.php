@extends('layout')

@section('content')
    <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="d-flex justify-content-center align-items-center height-nav bg-grad">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-md-6 col-lg-4 mx-auto mb-5 bg-white shadow rounded-custom p-4">
                        <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                            Logowanie
                        </p>
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                        </div>

                        <div class="form-group">
                            <label for="password"></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
                        </div>

                        <div class="form-group my-3">
                            <input class="form-check-input rounded form-checkbox" type="checkbox" id="rememver" value="remember">
                            <label class="form-check-label" for="remember">Zapamiętaj hasło</label>

                        <div class="form-group">
                            <button style="cursor:pointer; font-weight: bold;" type="submit" class="btn btn-log rounded-pill d-block mx-auto mt-4 col-12">Zaloguj się</button>
                        </div>

                        <div class="form-group">
                            <a style="cursor:pointer; font-weight: bold;" class="btn btn-reg rounded-pill d-block mx-auto my-3 col-12" href="{{ route('registration.create') }}">Zarejestruj się</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection