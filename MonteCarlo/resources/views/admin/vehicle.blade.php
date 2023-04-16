@extends('admin.layout')
@php
    use App\Models\Teacher;
@endphp
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Pojazdy</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="{{ route('vehicle.create') }}" class="btn btn-add">Dodaj pojazd</a>
            </div>
        </div>
        <div class="table-responsive rounded-4 mt-2">
            <table class="table table-hover align-middle table-borderless admin-table m-auto">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">Nr. rejestracyjny</th>
                        <th scope="col">Typ</th>
                        <th scope="col">Instruktor</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        @php
                            $teacher = Teacher::find($vehicle->Teacher_id);
                        @endphp
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->brand }}</td>
                            <td>{{ $vehicle->model }}</td>
                            <td>{{ $vehicle->numberplate }}</td>
                            <td>{{ $vehicle->type }}</td>
                            <td>
                                @if ($teacher)
                                    {{ $teacher->name }} {{ $teacher->surname }}
                                @else
                                    -----
                                @endif
                            </td>
                            <td class="text-end">
                                <a class="btn btn-table" href="{{ route('vehicle.show', $vehicle->id) }}">Więcej</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
