@extends('student.layout')
@section('content')
    <div class="container person-container rounded-4 px-5">
        <h1 class="text-center">Wynik testu</h1>

        <h2>Wynik: {{ $quizState['score'] }}</h2>

        <h2>Odpowiedzi</h2>
        <ul style="list-style-type: none;">
            @foreach ($quizState['answers'] as $index => $answer)
                <li>
                    Pytanie {{ $index + 1 }}:
                    @if ($answer == $questions[$index]->correctAnswer)
                        <strong>Poprawna</strong>
                    @else
                        <strong>Niepoprawna</strong>
                    @endif
                </li>
            @endforeach
        </ul>

        <h1 class="text-center"><a href="{{ route('student.test') }}" class="btn btn-add mb-3">Zakończ przegląd</a></h1>
    </div>
@endsection
