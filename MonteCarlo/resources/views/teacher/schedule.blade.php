@extends('teacher.layout')

@section('content')
<div class="m-auto mx-5">
    <div class="row align-items-center m-auto my-3">
        <div class="col ps-0">
            <h1 class="white">Harmonogram jazd</h1>
        </div>
        <div class="col text-end pe-0">
            <a href="{{ route('teacher.schedulecreate') }}" class="btn btn-add">Dodaj termin</a>
        </div>
    </div>
    <div class="table-responsive rounded-4 mt-2">
        <table class="table table-hover align-middle table-borderless admin-table m-auto">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Godzina</th>
                    <th scope="col">Kursant</th>
                    <th scope="col">Więcej</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ date('Y-m-d', strtotime($schedule->dateTime)) }}</td>
                        <td>{{ date('H:i', strtotime($schedule->dateTime)) }}</td>
                        <td>
                            @if ($schedule->student)
                                {{ $schedule->student->name}} 
                                {{ $schedule->student->surname }}
                            @else
                                ----
                            @endif
                        </td>
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