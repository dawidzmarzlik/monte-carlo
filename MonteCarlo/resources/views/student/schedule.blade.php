@extends('student.layout')

@section('content')
    <div class="m-auto mx-5">
        <div class="row align-items-center m-auto my-3">
            <div class="col ps-0">
                <h1 class="white">Harmonogram jazd</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="{{ route('student.pickdrive') }}" class="btn btn-add">Wybierz termin</a>
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
                                <th scope="col">Data</th>
                                <th scope="col">Godzina</th>
                                <th scope="col">Instruktor</th>
                                <th scope="col">Więcej</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($schedule->dateTime)) }}</td>
                                    <td>{{ date('H:i', strtotime($schedule->dateTime)) }}</td>
                                    <td>{{ $schedule->teacher->name }} {{ $schedule->teacher->surname }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('student.deldrive') }}">
                                            @method('patch')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $schedule->id }}">
                                            <button type="submit" style="cursor:pointer; font-weight: bold;"
                                                class="btn btn-add">Odwołaj</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
