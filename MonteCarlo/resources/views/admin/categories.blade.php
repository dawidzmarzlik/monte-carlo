@extends('admin.layout')
@section('content')
    <h1>Kategorie</h1>
    @foreach ($categories as $category)
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PATCH')
            <div>
                <h3>{{ $category->name }}</h3>
                <input type="number" name="price" value="{{ $category->price }}">
                <button type="submit">Update Price</button>
            </div>
        </form>
    @endforeach
@endsection
