@extends('teacher.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col px-auto">
                <h1 class="white">Kursant</h1>
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
                                {{ $student->name }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Nazwisko:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $student->surname }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Data urodzenia:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $student->birthDate }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Email:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $student->email }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Numer PKK:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $student->pkk }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Kurs na kategorię:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Instruktor:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $student->teacher->name }} {{ $student->teacher->surname }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Hasło:</h6>
                            </div>
                            <div class="col-sm person-data-container" type="password">
                                <input type="password" name="password" class="passwordpole noClick" value="{{ $student->password }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="row text-center">
                        <div class="col-sm pt-2">
                            <a class="btn btn-table" href="{{ route('teacher.student_edit', $student->id) }}">Zmień dane kursanta</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm"></div>
            </div>
        </div>
    </div>
@endsection
