@extends('teacher.layout')

@section('content')
    <div class="bg-grad">
        <a href="{{ route('teacher.schedule') }}" class="btn btn-add mb-3">Wróć</a>
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('teacher.store_schedule') }}">
                    @csrf
                    <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                        Dodawanie terminu
                    </p>
                    <div class="form-group">
                        <input type="datetime-local" class="form-control form-control-2" name="dateTime" id="dateTime"
                            placeholder="Data i godzina">
                        {!! $errors->first('dateTime', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <button style="cursor:pointer; font-weight: bold;" type="submit"
                            class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
