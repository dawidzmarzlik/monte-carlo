@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <a href="{{ url()->previous() }}" class="btn btn-add mb-3">Wróć</a>
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="text-center white">Przypisanie instruktora dla pojazdu o ID: {{ $vehicle->id }}</h1>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('vehicle.setTeacher', $vehicle->id) }}">
                    @method('patch')
                    @csrf
                    <label for="teacher"></label>
                    <div class="form-group">
                        <select class="form-control form-control-2" id="teacher" name="teacher">
                            <option value="">Brak przypisanego instruktora</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ $vehicle->Teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->id }}.
                                    {{ $teacher->name }}
                                    {{ $teacher->surname }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('teacher', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <button type="submit" style="cursor:pointer; font-weight: bold;"
                        class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Zapisz zmiany</button>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
