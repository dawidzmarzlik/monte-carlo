@extends('admin.layout')

@section('content')
    <div class="bg-grad">
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('teacher.update', $teacher->id) }}">
                    @method('patch')
                    @csrf
                    <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                        Edycja instruktora {{ $teacher->name }} {{ $teacher->surname }}
                    </p>
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control form-control-2" id="name" name="name"
                            placeholder="Imię" value="{{ old('name') != '' ? old('name') : $teacher->name }}">
                        {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control form-control-2" id="surname" name="surname"
                            placeholder="Nazwisko" value="{{ old('surname') != '' ? old('surname') : $teacher->surname }}">
                        {!! $errors->first('surname', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" onfocus="(this.type='date')" onlo class="form-control form-control-2"
                            id="birthDate" name="birthDate" placeholder="Data urodzenia"
                            value="{{ old('birthDate') != '' ? old('birthDate') : $teacher->birthDate }}">
                        {!! $errors->first('birthDate', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="number" class="form-control form-control-2 no-arrow" id="phoneNumber"
                            name="phoneNumber" placeholder="Numer telefonu" max="999999999"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="9"
                            value="{{ old('phoneNumber') != '' ? old('phoneNumber') : $teacher->phoneNumber }}">
                        {!! $errors->first('phoneNumber', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" class="form-control form-control-2" id="email" name="email"
                            placeholder="E-mail" value="{{ old('email') != '' ? old('email') : $teacher->email }}">
                        {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" class="form-control form-control-2" id="password" name="password"
                            placeholder="Hasło" value="{{ old('password') != '' ? old('password') : $teacher->password }}">
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
