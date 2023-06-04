@extends('layout')

@section('content')

        <div class="BoxCard">
            <div class="card-box">
                @foreach ($opinions as $opinion)
                    <div class="card">
                        <div class="card-body">
                            <h2>{{ $opinion->idStudent }}</h2>
                            <h4>Ocena: {{ $opinion->score }}</h4>
                            <p>{{ $opinion->opinionText }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>      

@endsection