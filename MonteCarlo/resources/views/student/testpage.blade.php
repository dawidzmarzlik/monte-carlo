@extends('student.layout')
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto pt-5">
            <div class="col">

            </div>
            <div class="col-md-10 col-lg-8">
                <div class="container person-container rounded-4 px-5">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center py-4">
                                            <img class="rounded-4"
                                                src="https://dla-przemyslu.pl/8134-thickbox_default/b-36-zakaz-zatrzymywania-sie-znak-drogowy-zakazu.jpg"
                                                alt="znak" height="250px" width="250px">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h3>Co oznacza znak B-36?</h3>
                                        <p>A. Zakaz zatrzymywania się</p>
                                        <p>B. Zakaz postoju</p>
                                        <p>C. Zakaz ruchu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                        <div class="col py-4"">
                            <div class="container person-container rounded-4 h-100">
                                <div class="row h-100">
                                    <div class="col-12 d-flex flex-column">
                                        <div class="flex-grow-1">
                                            <h5>Pytanie</h5>
                                            <p>1 z 32</p>
                                            <h5>Czas:</h5>
                                            <p>00:15 s</p>
                                        </div>
                                        <div class="m-0 mt-auto text-center">
                                            <button class="btn btn-add my-2 mx-0" style="width: 200px">Następne
                                                pytanie</button>
                                            <button class="btn btn-table my-2 mx-0" style="width: 200px">Zakończ
                                                test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
