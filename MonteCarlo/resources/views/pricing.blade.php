@extends('layout')

@section('content')
<div class="m-auto pt-4 admin-bg-grad">
    <div class="row align-items-center m-auto">
        <div class="col ps-0"></div>
        <div class="col-md-8 col-lg-6 text-center">
            <h1 class="white pb-4">Cennik</h1>
        <div class="table-responsive rounded-4 mt-2 pb-5">
            <table class="table table-hover align-middle table-borderless admin-table m-auto">
                <thead>
                    <tr>
                        <th scope="col">Kategoria</th>
                        <th scope="col">Cena [PLN]</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category }}</td>
                            <td>{{ $category->price }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        </div>
        <div class="col ps-0"></div>
    </div>
</div>
@endsection
