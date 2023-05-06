@extends('student.layout')
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Materiały dydaktyczne</h1>
            </div>
        </div>
        <div class="row align-items-center m-auto">
            <div class="col">

            </div>
            <div class="col-md-8 col-lg-6">
                <div class="table-responsive rounded-4 mt-2">
                    <table class="table table-hover align-middle text-start table-borderless admin-table m-auto">
                        <thead>
                            <tr>
                                <th scope="col">Tytuł</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Spotkanie organizacyjne</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="#">Pobierz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Przepisy o ruchu pojazdów</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="#">Pobierz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Podstawowe pojęcia związane z ruchem drogowym</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="#">Pobierz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prędkość, zachowanie odstępu i hamowanie pojazdów</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="#">Pobierz</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
