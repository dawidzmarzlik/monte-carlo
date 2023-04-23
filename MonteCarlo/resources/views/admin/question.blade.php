@extends('admin.layout')
@php
    use App\Models\Teacher;
@endphp
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Pytania teoretyczne</h1>
            </div>
            <div class="col text-end pe-0">
                <a href="{{ route('question.create') }}" class="btn btn-add">Dodaj pytanie</a>
            </div>
        </div>
        <div class="table-responsive rounded-4 mt-2">
            <table class="table table-hover align-middle table-borderless admin-table m-auto">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Treść pytania</th>
                        <th scope="col">Odpowiedź A</th>
                        <th scope="col">Odpowiedź B</th>
                        <th scope="col">Odpowiedź C</th>
                        <th scope="col">Poprawna odpowiedź</th>
                        <th scope="col">Punkty</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->questionText }}</td>
                            <td>{{ $question->answer1 }}</td>
                            <td>{{ $question->answer2 }}</td>
                            <td>{{ $question->answer3 }}</td>
                            <td>{{ $question->correctAnswer }}</td>
                            <td>{{ $question->questionScore }}</td>
                            <td class="text-end">
                                <a class="btn btn-table" href="{{ route('question.edit', $question->id) }}">Edytuj</a>
                            </td>
                            <td class="text-end">
                                <form action="{{ route('question.destroy', $question->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-add">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
