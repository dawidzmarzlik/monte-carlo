@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="text-center white">Edycja pojazdu ID: {{ $vehicle->id }}</h1>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('vehicle.update', $vehicle->id) }}">
                    @method('patch')
                    @csrf
                    <label for="brand"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Marka"
                            value="{{ old('brand') != '' ? old('brand') : $vehicle->brand }}">
                        {!! $errors->first('brand', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="model"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="model" name="model" placeholder="Model"
                            value="{{ old('model') != '' ? old('model') : $vehicle->model }}">
                        {!! $errors->first('model', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="numberplate"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="numberplate" name="numberplate" maxlength="8"
                            value="{{ old('numberplate') != '' ? old('numberplate') : $vehicle->numberplate }}"
                            placeholder="Nr. rejestracyjny">
                        {!! $errors->first('numberplate', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="type"></label>
                    <div class="form-group">
                        <select class="form-control" id="type" name="type">
                            <option value="">Wybierz typ</option>
                            <option value="Osobowy" {{ $vehicle->type == 'Osobowy' ? 'selected' : '' }}>Osobowy
                            </option>
                            <option value="Motocykl" {{ $vehicle->type == 'Motocykl' ? 'selected' : '' }}>Motocykl</option>
                            <option value="Ciężarowy" {{ $vehicle->type == 'Ciężarowy' ? 'selected' : '' }}>Ciężarowy
                            </option>
                            <option value="Autobus" {{ $vehicle->type == 'Autobus' ? 'selected' : '' }}>Autobus
                            </option>
                        </select>
                        {!! $errors->first('type', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <button type="submit" style="cursor:pointer; font-weight: bold;"
                        class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Zapisz zmiany</button>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
