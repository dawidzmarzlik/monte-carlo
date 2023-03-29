@extends('layout')

@section('content')
    <form method="POST" action="/register">
        @csrf
        <div class="d-flex justify-content-center align-items-center height-nav bg-grad">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-md-6 col-lg-4 mx-auto bg-white shadow rounded-custom p-4">
                        <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                            Rejestracja
                        </p>
                        @if(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('failed')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Imię" value="{{ old('name') }}">
                            {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Nazwisko" value="{{ old('surname') }}">
                            {!!$errors->first("surname", "<span class='text-danger'>:message</span>")!!}
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" onfocus="(this.type='date')" onlo class="form-control" id="birthDate" name="birthDate" placeholder="Data urodzenia" value="{{ old('birthDate') }}">
                            {!!$errors->first("birthDate", "<span class='text-danger'>:message</span>")!!}
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="number" class="form-control no-arrow" id="pkk" name="pkk" placeholder="Numer PKK" max="99999999999999999999" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="20" value="{{ old('pkk') }}">
                            {!!$errors->first("pkk", "<span class='text-danger'>:message</span>")!!}
                        </div>

                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                            {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                        </div>

                        <div class="form-group">
                            <label for="password"></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
                            {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                        </div>

                        <div class="form-group">
                            <button style="cursor:pointer; font-weight: bold;" type="submit" class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Zarejestruj się</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection