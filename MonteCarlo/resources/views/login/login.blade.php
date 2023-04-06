@extends('layout')

@section('content')
    <div class="bg-grad">
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="/login">
                    @csrf
                    <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                        Logowanie
                    </p>
                    {!! $errors->first('student', "<span class='text-danger'>:message</span>") !!}
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                            value="{{ old('email') }}">
                        {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
                        {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group my-3">
                        <input class="form-check-input rounded form-checkbox" type="checkbox" id="rememver"
                            value="remember">
                        <label class="form-check-label" for="remember">Zapamiętaj hasło</label>
                    </div>

                    <div class="form-group">
                        <button style="cursor:pointer; font-weight: bold;" type="submit"
                            class="btn btn-log rounded-pill d-block mx-auto mt-4 col-12">Zaloguj się</button>
                    </div>

                    <div class="form-group">
                        <a style="cursor:pointer; font-weight: bold;"
                            class="btn btn-reg rounded-pill d-block mx-auto my-3 col-12"
                            href="{{ route('registration.create') }}">Zarejestruj się</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
