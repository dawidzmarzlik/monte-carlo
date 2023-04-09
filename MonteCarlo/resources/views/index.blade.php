@extends('layout')

@section('content')
    <div class="col content">
        <div class="row bg-image-1">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <p class="row mb-1">Zostań odpowiedzialnym</p>
                <p class="row mb-1 offset-2">kierowcą razem z Monte Carlo</p>
                <p class="row mb-3 offset-5">Dołącz do nas już dziś!</p>
                <a class="row offset-7 btn btn-reg rounded" href="{{ route('registration.create') }}">Zarejestruj się!</a>
            </div>
        </div>
        <div class="row bg-image-2">
            <div id="carouselExample" class="carousel slide align-self-center">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="cards-wrapper justify-content-center align-items-center my-5">
                            <div class="card">
                                <div class="card-body">
                                    <p class=" card-title">Kategoria AM, A1, A2, A</p>
                                    <p class=" card-text">Kategoria A i pokrewne daje uprawnienia do kierowania motocyklem
                                    </p>
                                </div>
                                <img src="{{ asset('img/gSXS750AL7KELDiagonal-removebg-preview.png') }}"
                                    class="card-img-bottom" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="cards-wrapper justify-content-center align-items-center my-5">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class=" card-title">Kategoria B</h5>
                                    <p class=" card-text">Prawo jazdy kategorii B uprawnia do prowadzenia samochodów
                                        osobowych</p>
                                </div>
                                <img src="{{ asset('img/fordfiesta-removebg-preview.png') }}" class="card-img-bottom"
                                    alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="cards-wrapper justify-content-center align-items-center my-5">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class=" card-title">Kategoria C</h5>
                                    <p class=" card-text">Uprawnia do prowadzenia pojazdu samochodowego o dopuszczalnej
                                        masie całkowitej przekraczającej 3,5 t</p>
                                </div>
                                <img src="{{ asset('img/Ford-f-max.png') }}" class="card-img-bottom" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="cards-wrapper justify-content-center align-items-center my-5">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class=" card-title">Kategoria D</h5>
                                    <p class=" card-text">Kategoria D daje uprawnienia do kierowania autobusem</p>
                                </div>
                                <img src="{{ asset('img/yeni_travego_01-removebg-preview.png') }}" class="card-img-bottom"
                                    alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row bg-image-3">
            <div class="col-12 col-md-6">
                <div class="q-text">
                    <p class="mb-0 h2" style="font-weight:bold">Masz Pytanie?</p>
                    <p class="">Napisz do nas</p>
                </div>
            </div>
            <div class="col-12 col-md-6 align-self-center">
                <form method="POST" action="{{url('contact_mail')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="InputName" class="form-label">Imie Nazwisko</label>
                        <input type="text" class="form-control rounded" id="InputName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmailHome" class="form-label">E-mail</label>
                        <input type="email" class="form-control rounded" id="inputEmailHome" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="messageText" class="form-label">Treść wiadomości</label>
                        <textarea type="text" class="form-control rounded" id="messageText" rows="5" name="message"></textarea>
                    </div>
                    <button style="cursor:pointer; font-weight: bold;" type="submit"
                        class="btn btn-log rounded-pill d-block mx-auto my-4 col-4">Wyślij</button>
                </form>
            </div>
        </div>
    </div>
@endsection
