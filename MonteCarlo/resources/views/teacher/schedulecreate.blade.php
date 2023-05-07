@extends('teacher.layout')

@section('content')
    <div class="bg-grad">
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('teacher.store') }}">
                    @csrf
                    <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                        Dodawanie terminu
                    </p>
                    <div class="form-group">
                        <input type="text" onfocus="(this.type='date')" onlo class="form-control" id="datetime"
                            name="datetime" placeholder="Data i godzina" value="{{ old('datetime') }}">
                        {!! $errors->first('datetime', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="student" name="student" placeholder="Kursant"
                            value="{{ old('student') }}">
                        {!! $errors->first('student', "<span class='text-danger'>:message</span>") !!}
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
