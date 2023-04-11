@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Kursanci</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="#" class="btn btn-add">Dodaj kursanta</a>
            </div>
        </div>
        <div class="table-responsive rounded-4 mt-2">
            <table class="table table-hover align-middle table-borderless admin-table m-auto">
                <thead>
                    <tr>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Data urodzenia</th>
                        <th scope="col">Email</th>
                        <th scope="col">Numer PKK</th>
                        <th scope="col">Instruktor</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 20; $i++)
                        <tr>
                            <td>Adam</td>
                            <td>Nowak</td>
                            <td>01.01.2004</td>
                            <td>a.nowak@gmail.com</td>
                            <td>12345678901234567890</td>
                            <td>Jan Kowalski</td>
                            <td class="text-end">
                                <a class="btn btn-table" href="{{ route('admin.teacher.studentpage') }}">Więcej</a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
