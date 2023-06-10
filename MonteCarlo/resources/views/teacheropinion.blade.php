@extends('layout')

@section('content')

        <div class="BoxCardO">
            <div class="card-boxO">
                @foreach ($teacheropinions as $teacheropinion)
                    <div class="cardO">
                        <div class="card-bodyO">
                            <h2>
                                @if ($teacheropinion->idStudent)
                                {{ $teacheropinion->student->name }}
                                @else
                                Kursant
                                @endif
                            </h2>
                            <h3>
                                @if ($teacheropinion->idTeacher)
                                {{ $teacheropinion->teacher->name }} {{ $teacheropinion->teacher->surname }}
                                @else
                                Instruktor
                                @endif
                            </h3>
                            <h4>Ocena: {{ $teacheropinion->score }}</h4>
                            <p>{{ $teacheropinion->opinionText }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>      

@endsection