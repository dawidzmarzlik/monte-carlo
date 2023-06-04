@extends('admin.layout')
@section('content')
    <h1>Kategorie</h1>
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0"></div>
            <div class="col-md-8 col-lg-6 text-center">
                <div class="table-responsive rounded-4 mt-2">
                    <table class="table table-hover align-middle table-borderless admin-table m-auto">
                        <thead>
                            <tr>
                                <th scope="col">Nazwa</th>
                                <th scope="col">Cena</th>
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
                                        <td><input class="form-control form-control-3" style="text-align:center;"
                                                type="number" name="price" value="{{ $category->price }}"></td>
                                        <td><button class="btn btn-table" type="submit">Zaktualizuj cenę</button>
                                            <button class="btn btn-add" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $category->id }}">Usuń</button>
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
                                    <td><input class="form-control form-control-3" style="text-align:center;" type="text"
                                            name="category" placeholder="Nazwa kategorii"></td>
                                    </td>
                                    <td><input class="form-control form-control-3" style="text-align:center;" type="number"
                                            name="price" placeholder="Cena"></td>
                                    <td><button class="btn btn-table" type="submit">Dodaj kategorię</button></td>
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
