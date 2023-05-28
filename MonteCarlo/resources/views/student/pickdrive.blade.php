@extends('student.layout')

@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Wybierz termin jazd</h1>
                <a href="{{ route('student.schedule') }}" class="btn btn-add mb-3">Wróć</a>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <form method="POST" action="{{ route('student.setdrive') }}">
                    @method('patch')
                    @csrf
                    <label for="teacher"></label>
                    <div class="form-group">
                        <select class="form-control form-control-2" id="drive" name="drive">
                            <option value="">Wybierz wolny termin jazd</option>
                            @foreach ($schedules as $schedule)
                                <option value="{{ $schedule->id }}">
                                    {{ date('d-m-Y', strtotime($schedule->dateTime)) }}
                                    {{ date('H:i', strtotime($schedule->dateTime)) }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('drive', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <button type="submit" style="cursor:pointer; font-weight: bold;"
                        class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Zapisz zmiany</button>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
