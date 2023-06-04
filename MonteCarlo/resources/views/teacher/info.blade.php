@extends('teacher.layout')
@php
    use App\Models\Vehicle;
@endphp
@section('content')
    <div class="m-auto mx-5">
        <div class="row">
            <div class="col">
                <div class="row align-items-center m-auto my-3">
                    <div class="col">
                        <h1 class="white">Moje Dane</h1>
                    </div>
                </div>
                <div class="container person-container rounded-4 px-5">
                    <div class="row pt-1">
                        <div class="col-sm">
                            <h6>Imię:</h6>
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $teacher->name }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            <h6>Naziwsko:</h6>
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $teacher->surname }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            <h6>Data urodzenia:</h6>
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $teacher->birthDate }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            <h6>Telefon:</h6>
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $teacher->phoneNumber }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            <h6>Email:</h6>
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $teacher->email }}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            <h6>Hasło:</h6>
                        </div>
                        <div class="col-sm person-data-container" type="password">
                            <input type="password" name="password" class="passwordpole noClick"
                                value="{{ $teacher->password }}" readonly>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            <h6>Uprawnienia:</h6>
                        </div>
                        <div class="col-sm person-data-container">
                            @foreach ($teacher->permissions as $permission)
                                {{ $permission->courseRecords->category }},
                            @endforeach
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-sm">
                            <h6>Ilość kursantów:</h6>
                        </div>
                        <div class="col-sm person-data-container">
                            {{ $teacher->students->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row align-items-center m-auto my-3">
                    <div class="col">
                        <h1 class="white">Mój pojazd</h1>
                    </div>
                </div>
                <div class="container person-container rounded-4 px-5">
                    @if ($vehicle)
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Marka:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                @if ($vehicle)
                                    {{ $vehicle->brand }}
                                @endif
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Model:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                @if ($vehicle)
                                    {{ $vehicle->model }}
                                @endif
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Numer rejestracyjny:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                @if ($vehicle)
                                    {{ $vehicle->numberplate }}
                                @endif
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm">
                                <h6>Typ:</h6>
                            </div>
                            <div class="col-sm person-data-container">
                                @if ($vehicle)
                                    {{ $vehicle->type }}
                                @endif
                            </div>
                        </div>
                        <!-- Add any other fields for "Mój pojazd" here -->
                    @else
                        <h6 class="white"> Brak przypisanego pojazdu.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
