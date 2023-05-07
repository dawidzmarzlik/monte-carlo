@extends('teacher.layout')

@section('content')
<div class="m-auto mx-5">
    <div class="row align-items-center m-auto my-3">
        <div class="col ps-0">
            <h1 class="white">Kursanci</h1>
        </div>
    </div>
    <div class="table-responsive rounded-4 mt-2">
        <table class="table table-hover align-middle table-borderless admin-table m-auto">
            <thead>
                <tr>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Email</th>
                    <th scope="col">PKK</th>
                    <th scope="col">Więcej</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->surname }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->pkk }}</td>

                        <td>
                            <a class="btn btn-table" href="">Edytuj</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection