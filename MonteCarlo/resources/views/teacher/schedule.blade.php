@extends('teacher.layout')

@section('content')
<div class="m-auto mx-5">
    <div class="row align-items-center m-auto my-3">
        <div class="col ps-0">
            <h1 class="white">Harmonogram</h1>
        </div>
        <div class="col text-end pe-0">
            <a href="" class="btn btn-add">Dodaj termin</a>
        </div>
    </div>
    <div class="table-responsive rounded-4 mt-2">
        <table class="table table-hover align-middle table-borderless admin-table m-auto">
            <thead>
                <tr>
                    <th scope="col">Tytuł</th>
                    <th scope="col">Data</th>
                    <th scope="col">Godzina</th>
                    <th scope="col">Kursant</th>
                    <th scope="col">Telefon kursanta</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Więcej</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->title }}</td>
                        <td>{{ $schedule->date }}</td>
                        <td>{{ $schedule->time }}</td>
                        <td>{{ $schedule->student }}</td>
                        <td>{{ $schedule->sutdentNumber }}</td>
                        <td>{{ $schedule->category }}</td>
                        <td class="text-end">
                            <a class="btn btn-table" href="{{ route('schedule.edit', $schedule->id) }}">Edytuj</a>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection