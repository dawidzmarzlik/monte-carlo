@extends('admin.layout')

@section('content')
    <div class="bg-grad">
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('student.update', $student->id) }}">
                    @method('patch')
                    @csrf
                    <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                        Edycja kursanta {{ $student->name }} {{ $student->surname }}
                    </p>
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Imię"
                            value="{{ old('name') != '' ? old('name') : $student->name}}">
                        {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Nazwisko"
                        value="{{ old('surname') != '' ? old('surname') : $student->surname}}">
                        {!! $errors->first('surname', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" onfocus="(this.type='date')" onlo class="form-control" id="birthDate"
                            name="birthDate" placeholder="Data urodzenia" value="{{ old('birthDate') != '' ? old('birthDate') : $student->birthDate}}">
                        {!! $errors->first('birthDate', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="number" class="form-control no-arrow" id="pkk" name="pkk"
                            placeholder="Numer PKK" max="99999999999999999999"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="20" value="{{ old('pkk') != '' ? old('pkk') : $student->pkk}}">
                        {!! $errors->first('pkk', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                        value="{{ old('email') != '' ? old('email') : $student->email}}">
                        {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Hasło" value="{{ old('password') != '' ? old('password') : $student->password}}">
                        {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <button style="cursor:pointer; font-weight: bold;" type="submit"
                            class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Zmień</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection