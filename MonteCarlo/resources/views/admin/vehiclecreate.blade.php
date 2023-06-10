@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <a href="{{ route('admin.vehicle') }}" class="btn btn-add mb-3">Wróć</a>
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                    Dodaj pojazd
                </p>
                <form method="POST" action="{{ route('vehicle.store') }}">
                    @csrf

                    <label for="brand"></label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-2" id="brand" name="brand"
                            placeholder="Marka" value="{{ old('brand') }}">
                        {!! $errors->first('brand', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="model"></label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-2" id="model" name="model"
                            placeholder="Model" value="{{ old('model') }}">
                        {!! $errors->first('model', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="numberplate"></label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-2" id="numberplate" name="numberplate"
                            maxlength="8" placeholder="Nr. rejestracyjny" value="{{ old('numberplate') }}">
                        {!! $errors->first('numberplate', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="type"></label>
                    <div class="form-group">
                        <select class="form-control form-control-2" id="type" name="type">
                            <option value="" {{ old('type') == '' ? 'selected' : '' }}>Wybierz typ</option>
                            <option value="Osobowy" {{ old('type') == 'Osobowy' ? 'selected' : '' }}>Osobowy</option>
                            <option value="Motocykl" {{ old('type') == 'Motocykl' ? 'selected' : '' }}> Motocykl</option>
                            <option value="Ciężarowy" {{ old('type') == 'Ciężarowy' ? 'selected' : '' }}>Ciężarowy</option>
                            <option value="Autobus" {{ old('type') == 'Autobus' ? 'selected' : '' }}>Autobus</option>
                        </select>
                        {!! $errors->first('type', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <button type="submit" style="cursor:pointer; font-weight: bold;"
                        class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Dodaj</button>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
