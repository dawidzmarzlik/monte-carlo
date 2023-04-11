@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
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
                                Adam
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Nazwisko:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                Nowak
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Data urodzenia:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                01-01-2004
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Email:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                a.nowak@gmail.com
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Numer PKK:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                12345678901234567890
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Kurs na kategorię:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                B
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Instruktor:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                Jan Kowalski
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Najwyższy wynik w teście:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                32
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Hasło:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                ********
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h6>Terminarz jazd:</h6>
                    <div class="container">
                        @for ($i = 0; $i < 6; $i++)
                        <div class="row person-data-container mb-1">
                            <div class="col-sm">
                                20-04-2023
                            </div>
                            <div class="col-sm">
                                16:00
                            </div>
                            <div class="col-sm">
                                OPO 1234
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
                            <a class="btn btn-table" href="#">Zmień dane kursanta</a>
                        </div>
                        <div class="col-sm-auto pt-2">
                            <a class="btn btn-add" href="#">Usuń kursanta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
