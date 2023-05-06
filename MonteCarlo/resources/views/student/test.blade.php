@extends('student.layout')
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Testy</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="{{ route('student.testpage') }}" class="btn btn-add">Rozpocznij test</a>
            </div>
        </div>
        <div class="row align-items-center m-auto">
            <div class="col">

            </div>
            <div class="col-md-8 col-lg-6">
                <div class="table-responsive rounded-4 mt-2">
                    <table class="table table-hover align-middle table-borderless admin-table m-auto">
                        <thead>
                            <tr>
                                <th scope="col">Wynik [max 72 pkt.]</th>
                                <th scope="col">Data</th>
                                <th scope="col">Godzina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 15; $i++)
                                <tr>
                                    <td>60</td>
                                    <td>12.05.2021</td>
                                    <td>12:00</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
