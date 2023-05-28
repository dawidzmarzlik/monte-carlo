@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Pojazd ID: {{ $vehicle->id }}</h1>
                <a href="{{ route('admin.vehicle') }}" class="btn btn-add mb-3">Wróć</a>
            </div>
        </div>
        <div class="container person-container rounded-4">

            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="row pt-1">
                            <div class="col-sm">
                                Marka:
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $vehicle->brand }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Model:
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $vehicle->model }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Nr. rejestracyjny
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $vehicle->numberplate }}
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                Typ
                            </div>
                            <div class="col-sm person-data-container">
                                {{ $vehicle->type }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    Instruktor:
                    <div class="col">
                        @if ($teacher)
                            <div class="container">
                                <div class="row pt-1">
                                    <div class="col-sm">
                                        Imię:
                                    </div>
                                    <div class="col-sm person-data-container">
                                        @if ($teacher)
                                            {{ $teacher->name }}
                                        @endif
                                    </div>
                                </div>
                                <div class="row pt-1">
                                    <div class="col-sm">
                                        Nazwisko:
                                    </div>
                                    <div class="col-sm person-data-container">
                                        @if ($teacher)
                                            {{ $teacher->surname }}
                                        @endif
                                    </div>
                                </div>
                                <div class="row pt-1">
                                    <div class="col-sm">
                                        Uprawnienia:
                                    </div>
                                    <div class="col-sm person-data-container">

                                    </div>
                                </div>
                                <div class="row pt-1">
                                    <div class="col-sm">
                                        Telefon:
                                    </div>
                                    <div class="col-sm person-data-container">
                                        @if ($teacher)
                                            {{ $teacher->phoneNumber }}
                                        @endif
                                    </div>
                                </div>
                                <div class="row pt-1">
                                    <div class="col-sm">
                                        Email:
                                    </div>
                                    <div class="col-sm person-data-container">
                                        @if ($teacher)
                                            {{ $teacher->email }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            Brak przypisanego instruktora.
                        @endif
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="row text-end pe-0">
                        <div class="col-sm pt-2">
                            <a class="btn btn-table" href="{{ route('vehicle.edit', $vehicle->id) }}">Zmień dane
                                pojazdu</a>
                        </div>
                        <div class="col-sm-auto pt-2">
                            <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-add">Usuń pojazd</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row text-end pe-0">
                        <div class="col-sm pt-2">
                            @if ($teacher)
                                <a class="btn btn-table" href="{{ route('vehicle.teacher', $vehicle->id) }}">Zmień
                                    instruktora</a>
                            @else
                                <a class="btn btn-table" href="{{ route('vehicle.teacher', $vehicle->id) }}">Przypisz
                                    instruktora</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
