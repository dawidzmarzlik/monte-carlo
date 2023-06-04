@extends('layout')

@section('content')

        <div class="BoxCardO">
            <div class="card-boxO">
                @foreach ($opinions as $opinion)
                    <div class="cardO">
                        <div class="card-bodyO">
                            <h2>
                                @if ($opinion->idStudent)
                                {{ $opinion->student->name }} {{ $opinion->student->surname }}
                                @else
                                Kursant
                                @endif
                            </h2>
                            <h4>Ocena: {{ $opinion->score }}</h4>
                            <p>{{ $opinion->opinionText }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>      

@endsection