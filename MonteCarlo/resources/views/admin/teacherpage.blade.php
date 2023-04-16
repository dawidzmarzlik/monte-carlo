@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Instruktor</h1>
            </div>
        </div>
        <div class="container person-container rounded-4">
            <div class="row">
                
                <div class="col">
                    <div class="container">
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Imię:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $teacher->name }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Nazwisko:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $teacher->surname }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Data urodzenia:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $teacher->birthDate }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Telefon:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $teacher->phoneNumber }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Email:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $teacher->email }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Hasło:</h6>
                            </div>
                            <div class="col-sm person-data-container" type="password">
                                <input type="password" name="password" class="passwordpole noClick" value="{{ $teacher->password }}" readonly>
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Uprawnienia:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Ilość kursantów:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Pojazd:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h6>Kursanci:</h6>
                    <div class="container">
                        @for ($i = 0; $i < 3; $i++)
                        <div class="row person-data-container mb-1">
                            <div class="col-sm">
                                Michał
                            </div>
                            <div class="col-sm">
                                Nowak
                            </div>
                            <div class="col-sm">
                                12345678901234567890
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm">
                    <div class="row text-end pe-0">
                        <div class="col-sm pt-2">
                            <a class="btn btn-table" href="{{ route('teacher.edit', $teacher->id) }}">Zmień dane instruktora</a>
                        </div>
                        <div class="col-sm-auto pt-2">
                            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-add">Usuń instruktora</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
