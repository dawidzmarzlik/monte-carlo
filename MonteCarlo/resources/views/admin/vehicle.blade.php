@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Pojazdy</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="#" class="btn btn-add">Dodaj pojazd</a>
            </div>
        </div>
        <div class="table-responsive rounded-4 mt-2">
            <table class="table table-hover align-middle table-borderless admin-table m-auto">
                <thead>
                    <tr>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">Nr. rejestracyjny</th>
                        <th scope="col">Typ</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 20; $i++)
                        <tr>
                            <td>Ford</td>
                            <td>Fiesta</td>
                            <td>OPO 24534</td>
                            <td>Kompakt</td>
                            <td class="text-end">
                                <a class="btn btn-table" href="{{ route('admin.vehicle.vehiclepage') }}">Więcej</a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
