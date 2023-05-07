@extends('student.layout')

@section('content')
    <div class="mx-1">
        <div class="row">
            <div class="col">
                <div class="row align-items-center m-auto my-3">
                    <div class="col">
                        <h1 class="white">Moje dane</h1>
                    </div>
                </div>
                <div class="container person-container rounded-4 px-5">
                    <div class="row pt-1">
                        <div class="col-sm">
                            Imię:
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $student->name }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            Nazwisko:
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $student->surname }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            E-mail:
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $student->email }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            Data urodzenia:
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $student->birthDate }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            Numer PKK:
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $student->pkk }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row align-items-center m-auto my-3">
                    <div class="col">
                        <h1 class="white">Instruktor</h1>
                    </div>
                </div>
                <div class="container person-container rounded-4 px-5">
                    <div class="row pt-1">
                        <div class="col-sm">
                            Imię:
                        </div>
                        <div class="col-sm person-data-container">
                            @if ($teacher)
                                {{ $teacher->name }}
                            @else
                                -----
                            @endif
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            Nazwisko:
                        </div>
                        <div class="col-sm person-data-container">
                            @if ($teacher)
                                {{ $teacher->surname }}
                            @else
                                -----
                            @endif
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            E-mail:
                        </div>
                        <div class="col-sm person-data-container">
                            @if ($teacher)
                                {{ $teacher->email }}
                            @else
                                -----
                            @endif
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            Data urodzenia:
                        </div>
                        <div class="col-sm person-data-container">
                            @if ($teacher)
                                {{ $teacher->birthDate }}
                            @else
                                -----
                            @endif
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            Nr telefonu:
                        </div>
                        <div class="col-sm person-data-container">
                            @if ($teacher)
                                {{ $teacher->phoneNumber }}
                            @else
                                -----
                            @endif
                        </div>
                    </div>
                    <div class="row pt-3 pb-0">
                        @if ($teacher)
                            <a class="btn btn-add" href="{{ route('student.teacher') }}">Zmień instruktora</a>
                        @else
                            <a class="btn btn-add" href="{{ route('student.teacher') }}">Wybierz instruktora</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
