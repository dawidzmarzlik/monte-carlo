@extends('layout')

@section('content')
    <div class="bg-grad">
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4 mt-5">
                <form method="POST" action="recover">
                    @csrf
                    <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                        Zapomniałeś hasła?
                    </p>
                    <div class="text-recover">
                        <p class="text-center mt-3 mb-0">Podaj swój adres e-mail, a my</p>
                        <p class="text-center my-0">wyślemy do Ciebie wiadomość z</p>
                        <p class="text-center">dalszymi instrukcjami</p>
                    </div>
                    @if (Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('failed') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                            value="{{ old('email') }}">
                        {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                    </div>
                    <div class="form-group">
                        <p class="text-end me-1 mt-3"><a href="" class="link-dark">Wyślij e-mail ponownie</a></p>
                    </div>
                    <div class="form-group">
                        <button style="cursor:pointer; font-weight: bold;" type="submit"
                            class="btn btn-log rounded-pill d-block mx-auto mt-5 mb-3 col-12">Wyślij</button>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('login.login') }}" style="cursor:pointer; font-weight: bold;" type="button"
                            class="btn btn-reg rounded-pill d-block mx-auto mb-3 col-12">Wróc na stronę logowania</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
