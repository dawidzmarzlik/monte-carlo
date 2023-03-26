@extends('layout')

@section('content')
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="d-flex justify-content-center align-items-center height-nav bg-grad">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-md-6 col-lg-4 mx-auto bg-white shadow rounded-custom p-4">
                        <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                            Rejestracja
                        </p>
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Imię" required>
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Nazwisko">
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" onfocus="(this.type='date')" onlo class="form-control" id="birthDate" name="birthDate" placeholder="Data urodzenia" required>
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="number" class="form-control no-arrow" id="pkk" name="pkk" placeholder="Numer PKK" max="99999999999999999999" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="20">
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
                            <button style="cursor:pointer; font-weight: bold;" type="submit" class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Zarejestruj się</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection