@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="text-center white">Dodaj pojazd</h1>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('vehicle.store') }}">
                    @csrf

                    <label for="brand"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Marka"
                            required>
                    </div>

                    <label for="model"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="model" name="model" placeholder="Model"
                            required>
                    </div>

                    <label for="numberplate"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="numberplate" name="numberplate" maxlength="8"
                            placeholder="Nr. rejestracyjny" required>
                    </div>

                    <label for="type"></label>
                    <div class="form-group">
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Wybierz typ</option>
                            <option value="Hatchback">Hatchback</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Coupe">Coupe</option>
                            <option value="SUV">SUV</option>
                            <option value="Ciężarówka">Ciężarówka</option>
                            <option value="Ciągnik siodłowy">Ciągnik siodłowy</option>
                        </select>
                    </div>

                    <button type="submit" style="cursor:pointer; font-weight: bold;"
                        class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Dodaj</button>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
