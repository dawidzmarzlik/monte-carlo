@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Instruktor</h1>
            </div>
        </div>
        <div class="container teacher-container rounded-4">
            <div class="row">
                
                <div class="col">
                    <div class="container">
                        <div class="row pt-1">
                            <div class="col-sm">
                                Imię:
                            </div>
                            <div class="col-sm">
                                Jan
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Nazwisko:
                            </div>
                            <div class="col-sm">
                                Kowalski
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Data urodzenia:
                            </div>
                            <div class="col-sm">
                                01-01-1990
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Telefon:
                            </div>
                            <div class="col-sm">
                                +48 123 456 789
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Email:
                            </div>
                            <div class="col-sm">
                                j.kowalski@gmail.com
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Hasło:
                            </div>
                            <div class="col-sm">
                                ********
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Uprawnienia:
                            </div>
                            <div class="col-sm">
                                B
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Ilość kursantów:
                            </div>
                            <div class="col-sm">
                                3
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Pojazd:
                            </div>
                            <div class="col-sm">
                                OPO 1234
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    Kursanci:
                    <div class="container">
                        @for ($i = 0; $i < 3; $i++)
                        <div class="row pt-1">
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
                            <a class="btn btn-table" href="#">Zmień dane instruktora</a>
                        </div>
                        <div class="col-sm-auto pt-2">
                            <a class="btn btn-add" href="#">Usuń instruktora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
