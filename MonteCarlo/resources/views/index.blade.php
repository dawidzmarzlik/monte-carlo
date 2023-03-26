@extends('layout')

@section('content')
<div class="col">
    <div class="row bg-image-1">
        <div class="color-overlay d-flex flex-column justify-content-center align-items-center">
            <div class="row fs-4 mb-1">Zostań odpowiedzialnym</div>
            <div class="row fs-4 mb-1 offset-1">kierowcą razem z Monte Carlo</div>
            <div class="row fs-3 mb-1 offset-2">Dołącz do nas już dziś!</div>
            <a class="row offset-4 btn btn-reg rounded-pill" href="{{ route('registration.create') }}">Zarejestruj się</a>
        </div>
    </div>
    <div class="row bg-image-2">
        <div id="carouselExample" class="carousel slide align-self-center">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper justify-content-center align-items-center my-5">
                    <div class="card">
                        <div class="card-body">
                        <p class="fs-2 card-title">Kategoria AM, A1, A2, A</p>
                        <p class="fs-6 card-text">Kategoria A i pokrewne daje uprawnienia do kierowania motocyklem</p>
                        </div>
                        <img src="{{ asset('img/gSXS750AL7KELDiagonal-removebg-preview.png') }}" class="card-img-bottom" alt="...">
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper justify-content-center align-items-center my-5">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="fs-2 card-title">Kategoria B</h5>
                        <p class="fs-6 card-text">Prawo jazdy kategorii B uprawnia do prowadzenia samochodów osobowych</p>
                        </div>
                        <img src="{{ asset('img/fordfiesta-removebg-preview.png') }}" class="card-img-bottom" alt="...">
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper justify-content-center align-items-center my-5">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="fs-2 card-title">Kategoria C</h5>
                        <p class="fs-6 card-text">Uprawnia do prowadzenia pojazdu samochodowego o dopuszczalnej masie całkowitej przekraczającej 3,5 t</p>
                        </div>
                        <img src="{{ asset('img/Ford-f-max.png') }}" class="card-img-bottom" alt="...">
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper justify-content-center align-items-center my-5">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="fs-2 card-title">Kategoria D</h5>
                        <p class="fs-6 card-text">Kategoria D daje uprawnienia do kierowania autobusem</p>
                        </div>
                        <img src="{{ asset('img/yeni_travego_01-removebg-preview.png') }}" class="card-img-bottom" alt="...">
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
                <p class="fs-3 mb-0" style="font-weight:bold">Masz Pytanie?</p>
                <p class="fs-6">Napisz do nas</p>
            </div>
        </div>
        <div class="col-12 col-md-6 align-self-center">
            <form>
                <div class="mb-3">
                  <label for="inputEmailHome" class="form-label">E-mail</label>
                  <input type="email" class="form-control rounded" id="inputEmailHome" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="messageText" class="form-label">Treść wiadomości</label>
                  <textarea type="text" class="form-control rounded" id="messageText" rows="5"></textarea>
                </div>
                <button style="cursor:pointer; font-weight: bold;" type="submit" class="btn btn-log rounded-pill d-block mx-auto my-4 col-4">Wyślij</button>              </form>
        </div>
    </div>
    
    <footer class="container py-5 bg-footer vw-100">
        <div class="row">
        <div class="col-12 col-md-6">
            <h5>Kontakt</h5>
            <p class="text-light">tel: +48 765 098 321</p>
            <p class="text-light">tel: +48 900 800 700</p>
            <p class="text-light">e-mail: MonteCarlo@gmail.com</p>
        </div>
        <div class="col-12 col-md-6 text-end">
            <h5>Adres</h5>
            <p class="text-light">ul. Oleska 2a</p>
            <p class="text-light">46-200 Opole</p>
        </div>
        </div>
    </footer>
  
  
    
</div>

@endsection