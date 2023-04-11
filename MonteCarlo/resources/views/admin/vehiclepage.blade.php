@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Pojazd</h1>
            </div>
        </div>
        <div class="container person-container rounded-4">

            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="row pt-1">
                            <div class="col-sm">
                                Marka:
                            </div>
                            <div class="col-sm person-data-container">
                                Ford
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Model:
                            </div>
                            <div class="col-sm person-data-container">
                                Fiesta
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Nr. rejestracyjny
                            </div>
                            <div class="col-sm person-data-container">
                                OPO 24534
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Typ
                            </div>
                            <div class="col-sm person-data-container">
                                Kompakt
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    Instruktor:
                    <div class="col">
                        <div class="container">
                            <div class="row pt-1">
                                <div class="col-sm">
                                    Imię:
                                </div>
                                <div class="col-sm person-data-container">
                                    Jan
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-sm">
                                    Nazwisko:
                                </div>
                                <div class="col-sm person-data-container">
                                    Kowalski
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-sm">
                                    Uprawnienia:
                                </div>
                                <div class="col-sm person-data-container">
                                    B
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-sm">
                                    Telefon:
                                </div>
                                <div class="col-sm person-data-container">
                                    +48 123 456 789
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-sm">
                                    Email:
                                </div>
                                <div class="col-sm person-data-container">
                                    j.kowalski@gmail.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="row text-end pe-0">
                        <div class="col-sm pt-2">
                            <a class="btn btn-table" href="#">Zmień dane pojazdu</a>
                        </div>
                        <div class="col-sm-auto pt-2">
                            <a class="btn btn-add" href="#">Usuń pojazd</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row text-end pe-0">
                        <div class="col-sm pt-2">
                            <a class="btn btn-table" href="#">Zmień instruktora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
