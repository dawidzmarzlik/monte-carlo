@extends('layout')

@section('content')

    <h2>Register</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Imię:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="name">Nazwisko:</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>

        <div class="form-group">
            <label for="name">Data urodzenia:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate">
        </div>

        <div class="form-group">
            <label for="name">Numer PKK:</label>
            <input type="text" class="form-control" id="pkk_number" name="pkk_number">
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection