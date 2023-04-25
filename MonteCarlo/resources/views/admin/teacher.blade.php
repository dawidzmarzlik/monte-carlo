@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Instruktorzy</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="{{ route('teacher.create') }}" class="btn btn-add">Dodaj instruktora</a>
            </div>
        </div>
        <div class="table-responsive rounded-4 mt-2">
            <table class="table table-hover align-middle table-borderless admin-table m-auto">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Numer telefonu</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ilość kursantów</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->surname }}</td>
                            <td>{{ $teacher->phoneNumber }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td></td>
                            <td class="text-end">
                                <a class="btn btn-table" href="{{ route('teacher.show', $teacher->id) }}">Więcej</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
