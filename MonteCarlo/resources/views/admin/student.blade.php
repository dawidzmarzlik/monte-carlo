@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Kursanci</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="{{ route('student.create') }}" class="btn btn-add">Dodaj kursanta</a>
            </div>
        </div>
        <div class="table-responsive rounded-4 mt-2">
            <table class="table table-hover align-middle table-borderless admin-table m-auto">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
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
                    
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->surname }}</td>
                            <td>{{ $student->birthDate }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->pkk }}</td>
                            <td></td>
                            <td class="text-end">
                                <a class="btn btn-table" href="{{ route('student.show', $student->id) }}">Więcej</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
