@extends('admin.layout')

@section('content')
    <div class="m-auto">
        <div class="row d-flex align-items-center justify-content-center p-4 m-0">
            <div class="col-md-6 col-lg-4 align-self-center justify-content-center bg-white rounded-4 p-4">
                <p class="fs-1 fs-sm-4 pt-3 text-center" style="font-weight: bold;">
                    Edycja pytania ID: {{ $question->id }}
                </p>
                <form method="POST" action="{{ route('question.update', $question->id) }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf

                    <label for="questionText"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="questionText" name="questionText"
                            placeholder="Treść pytania"
                            value="{{ old('questionText') != '' ? old('questionText') : $question->questionText }}">
                        {!! $errors->first('questionText', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="answer1"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="answer1" name="answer1" placeholder="Odpowiedź 1"
                            value="{{ old('answer1') != '' ? old('answer1') : $question->answer1 }}">
                        {!! $errors->first('answer1', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="answer2"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="answer2" name="answer2" placeholder="Odpowiedź 2"
                            value="{{ old('answer2') != '' ? old('answer2') : $question->answer2 }}">
                        {!! $errors->first('answer2', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="answer3"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="answer3" name="answer3"
                            placeholder="Odpowiedź 3 (pozostaw puste jeśli odpowiedzi to TAK lub NIE)"
                            value="{{ old('answer3') != '' ? old('answer3') : $question->answer3 }}">
                        {!! $errors->first('answer3', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="correctAnswer"></label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="correctAnswer" name="correctAnswer"
                            placeholder="Poprawna odpowiedź (dokładna treść)"
                            value="{{ old('correctAnswer') != '' ? old('correctAnswer') : $question->correctAnswer }}">
                        {!! $errors->first('correctAnswer', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="questionScore"></label>
                    <div class="form-group">
                        <select class="form-control" id="questionScore" name="questionScore">
                            <option value="">Wybierz punkty</option>
                            <option value="1" {{ $question->questionScore == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $question->questionScore == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $question->questionScore == '3' ? 'selected' : '' }}>3</option>
                        </select>
                        {!! $errors->first('questionScore', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <label for="questionFile"></label>
                    <div class="form-group">
                        <input class="form-control" type="file" id="questionFile" name="questionFile"
                            value="{{ old('questionFile') != '' ? old('questionFile') : $question->questionFile }}">
                        {!! $errors->first('questionFile', "<span class='text-danger'>:message</span>") !!}
                    </div>
                    @if ($question->questionFile)
                        <div class="form-group text-center pt-5">
                            <img class="img-fluid" src="{{ asset($question->questionFile) }}"
                                alt="{{ asset($question->questionFile) }}">
                        </div>
                    @endif

                    <button type="submit" style="cursor:pointer; font-weight: bold;"
                        class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Zapisz zmiany</button>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
