@extends('layout')

@section('content')
    <div class="row content bg-grad">
        <div class="col-12 col-md-6 about-us">
            <img class="about-us-img" src="{{ asset('img/czerwona-strzała.png') }}" alt="...">
        </div>
        <div class="col-12 col-md-6 about-us">
            <p class="about-us-text">Witaj w Szkole Nauki Jazdy "Monte Carlo"! Jesteśmy profesjonalną szkołą z doświadczonymi
                instruktorami, elastycznymi kursami i doskonałym stanem technicznym floty samochodów. Oferujemy zarówno
                kursy teoretyczne, jak i praktyczne, które są dostosowane do indywidualnych potrzeb kursantów. Nasza
                przyjazna atmosfera pozwala na swobodne podejście do nauki, co pomaga naszym kursantom w osiągnięciu
                sukcesu. Jeśli szukasz kompleksowego i wysokiej jakości szkolenia jazdy, to zapraszamy do naszej szkoły!</p>
        </div>
    </div>
@endsection
