@extends('admin.layout')

@section('content')
    <div class="bg-grad">
        <a href="{{ route('admin.student') }}" class="btn btn-add mb-3">Wróć</a>
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('student.store') }}">
                    @csrf
                    <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                        Dodawanie kursanta
                    </p>
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control form-control-2" id="name" name="name"
                            placeholder="Imię" value="{{ old('name') }}">
                        {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control form-control-2" id="surname" name="surname"
                            placeholder="Nazwisko" value="{{ old('surname') }}">
                        {!! $errors->first('surname', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" onfocus="(this.type='date')" onlo class="form-control form-control-2"
                            id="birthDate" name="birthDate" placeholder="Data urodzenia" value="{{ old('birthDate') }}">
                        {!! $errors->first('birthDate', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="number" class="form-control form-control-2 no-arrow" id="pkk" name="pkk"
                            placeholder="Numer PKK" max="99999999999999999999"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="20" value="{{ old('pkk') }}">
                        {!! $errors->first('pkk', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" class="form-control form-control-2" id="email" name="email"
                            placeholder="E-mail" value="{{ old('email') }}">
                        {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="phoneNumber"></label>
                        <input type="number" class="form-control form-control-2" id="phoneNumber" name="phoneNumber"
                            placeholder="Numer Telefonu" max="999999999"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="9" value="{{ old('phoneNumber') }}">
                        {!! $errors->first('phoneNumber', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="category" style="color: grey" class="dropdown-toggle form-control form-control-2 mt-3"
                            id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">Wybierz kursy, na które
                            chcesz się zapisać</label>
                        <div class="dropdown">
                            <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                                @foreach ($categories as $category)
                                    <li>
                                        <input class="form-check-input" type="checkbox" name="categories[]"
                                            value="{{ $category->id }}" id="category{{ $category->id }}"
                                            {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="category{{ $category->id }}">
                                            {{ $category->category }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {!! $errors->first('categories', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" class="form-control form-control-2" id="password" name="password"
                            placeholder="Hasło">
                        {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <button style="cursor:pointer; font-weight: bold;" type="submit"
                            class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
