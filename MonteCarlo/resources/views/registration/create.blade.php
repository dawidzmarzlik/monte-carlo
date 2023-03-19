@extends('layout')

@section('content')
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="container custom-vert">
                <div class="row">
                    <div class="col-12 col-sm-9 col-md-6 col-lg-4 mx-auto my-5 bg-white shadow rounded-custom p-4">
                        <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                            Rejestracja
                        </p>
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Imię" required>
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nazwisko">
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" onfocus="(this.type='date')" onlo class="form-control" id="birthdate" name="birthdate" placeholder="Data urodzenia" required>
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="number" class="form-control no-arrow" id="pkk_number" name="pkk_number" placeholder="Numer PKK" max="9999999999999999999999999" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="25">
                        </div>

                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                        </div>

                        <div class="form-group">
                            <label for="password"></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
                        </div>

                        <div class="form-group">
                            <button style="cursor:pointer" type="submit" class="btn btn-reg rounded-pill d-block mx-auto mt-3 col-12">Zarejestruj się</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection