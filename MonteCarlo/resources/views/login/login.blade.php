@extends('layout')

@section('content')
    <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="container custom-vert">
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

                        <div class="form-group my-3 text-center">
                            <input class="form-check-input rounded form-checkbox" type="checkbox" id="rememver" value="remember">
                            <label class="form-check-label" for="remember">Zapamiętaj hasło</label>

                        <div class="form-group">
                            <button style="cursor:pointer" type="submit" class="btn btn-log rounded-pill d-block mx-auto my-3 col-12">Zaloguj się</button>
                        </div>

                        <div class="form-group">
                            <button style="cursor:pointer" class="btn btn-reg rounded-pill d-block mx-auto my-3 col-12">Zarejestruj się</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection