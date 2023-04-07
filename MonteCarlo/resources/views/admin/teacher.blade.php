@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Instruktorzy</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="#" class="btn btn-add">Dodaj instruktora</a>
            </div>
        </div>
        <div class="table-responsive rounded-4 mt-2">
            <table class="table table-hover align-middle table-borderless admin-table m-auto">
                <thead>
                    <tr>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Numer telefonu</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ilość kursantów</th>
                        <th scope="col">Pojazd</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 20; $i++)
                        <tr>
                            <td>Jan</td>
                            <td>Kowalski</td>
                            <td>123 456 789</td>
                            <td>j.kowalski@gmail.com</td>
                            <td>2</td>
                            <td>OPO 24534</td>
                            <td class="text-end">
                                <a class="btn btn-table" href="{{ route('admin.teacher.teacherpage') }}">Więcej</a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
