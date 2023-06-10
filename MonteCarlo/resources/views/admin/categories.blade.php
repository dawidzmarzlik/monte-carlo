@extends('admin.layout')
@section('content')
    <h1 class="white">Kategorie</h1>
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0"></div>
            <div class="col-md-8 col-lg-6 text-center">
                @if (session('success_add'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('success_add') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success_update'))
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        {{ session('success_update') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success_delete'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        {{ session('success_delete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive rounded-4 mt-2">
                    <table class="table table-hover align-middle table-borderless admin-table m-auto">
                        <thead>
                            <tr>
                                <th scope="col">Nazwa</th>
                                <th scope="col">Cena [PLN]</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <form method="POST" action="{{ route('categories.update', $category) }}">
                                        @csrf
                                        @method('PATCH')
                                        <td>{{ $category->category }}</td>
                                        <td><input class="form-control form-control-3"
                                                style="text-align:center; min-width:100px;" type="number"
                                                name="price{{ $category->id }}" value="{{ $category->price }}">
                                            {!! $errors->first(
                                                'price{{ $category->id }}',
                                                "<span class='text-warning' style='font-size: 0.75rem'>:message</span>",
                                            ) !!}
                                        </td>
                                        <td>
                                            <button class="btn btn-table"
                                                style="white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow: ellipsis; min-width:170px"
                                                type="submit">Zaktualizuj cenę</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-add" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $category->id }}"
                                                style="min-width:170px">Usuń</button>
                                        </td>
                                    </form>
                                </tr>
                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $category->id }}">
                                                    Potwierdzenie
                                                    usunięcia</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Czy na pewno chcesz usunąć kategorię "{{ $category->category }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-table"
                                                    data-bs-dismiss="modal">Anuluj</button>
                                                <form method="POST"
                                                    action="{{ route('categories.destroy', $category->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-add">Usuń</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('categories.store') }}">
                                    @csrf
                                    <td><input class="form-control form-control-3"
                                            style="text-align:center; min-width:150px;" type="text" name="category"
                                            placeholder="Nazwa kategorii" value="{{ old('category') }}">
                                        {!! $errors->first('category', "<span class='text-warning' style='font-size: 0.75rem'>:message</span>") !!}
                                    </td>
                                    <td><input class="form-control form-control-3"
                                            style="text-align:center; min-width:100px;" type="number" name="price"
                                            placeholder="Cena" value="{{ old('price') }}">
                                        {!! $errors->first('price', "<span class='text-warning' style='font-size: 0.75rem'>:message</span>") !!}
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <button class="btn btn-table"
                                            style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis; min-width:170px"
                                            type="submit">Dodaj kategorię</button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
