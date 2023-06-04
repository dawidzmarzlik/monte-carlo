@extends('student.layout')
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto pt-5">
            <div class="col">

            </div>
            <div class="col-md-10 col-lg-8">
                <form action="{{ route('test.next') }}" method="POST">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $questions[$quizState['current_question']]->id }}">

                    <div class="container person-container rounded-4 px-5">
                        <div class="row">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col text-center py-4">
                                                @if ($questions[$quizState['current_question']]->questionFile != null)
                                                    <img class="rounded-4"
                                                        src="{{ asset($questions[$quizState['current_question']]->questionFile) }}"
                                                        style="height:100%; width:100%;">
                                                @else
                                                    <img class="rounded-4"
                                                        src="{{ asset('storage/files/placeholder.png') }}"
                                                        style="height:100%; width:100%;">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h3>{{ $questions[$quizState['current_question']]->questionText }}</h3>

                                            <p><input class="form-check-input" type="radio" name="picked_option"
                                                    value="{{ $questions[$quizState['current_question']]->answer1 }}">
                                                {{ $questions[$quizState['current_question']]->answer1 }}</p>

                                            <p><input class="form-check-input" type="radio" name="picked_option"
                                                    value="{{ $questions[$quizState['current_question']]->answer2 }}">
                                                {{ $questions[$quizState['current_question']]->answer2 }}</p>

                                            @if ($questions[$quizState['current_question']]->answer3 != null)
                                                <p><input class="form-check-input" type="radio" name="picked_option"
                                                        value="{{ $questions[$quizState['current_question']]->answer3 }}">
                                                    {{ $questions[$quizState['current_question']]->answer3 }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                </div>
                            </div>
                            <div class="col py-4"">
                                <div class="container person-container rounded-4 h-100">
                                    <div class="row h-100">
                                        <div class="col-12 d-flex flex-column">
                                            <div class="flex-grow-1">
                                                <h2 class="text-center">Pytanie {{ $quizState['current_question'] + 1 }} z
                                                    32</h2>
                                            </div>
                                            <div class="m-0 mt-auto text-center">
                                                @if ($quizState['current_question'] != 31)
                                                    <button class="btn btn-add my-2 mx-0" style="width: 200px"
                                                        type="submit">Następne
                                                        pytanie</button>
                                                @else
                                                    <button class="btn btn-add my-2 mx-0" style="width: 200px"
                                                        type="submit">Zakończ test</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
