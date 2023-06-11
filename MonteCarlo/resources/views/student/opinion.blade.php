@extends('student.layout')
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Opinia o szkole</h1>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="container person-container rounded-4 px-5">
                        <h3 class="white" style="font-weight: bold;">Podziel się z nami swoją opinią</h3>
                        <form action="{{ route('student.opinion') }}" method="post">
                            @csrf
                            <label for="opinion"></label>
                            <div class="form-floating">
                                <textarea class="form-control form-control-3 rounded-4" placeholder="Twoja opinia." id="opinion" name="opinion"
                                    style="height: 350px;" maxlength="100"></textarea>
                            </div>

                            <select class="form-control form-control-3 mt-4" id="drive" name="score">
                                <option value="" selected>Wybierz ocenę</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                            <button type="submit" style="cursor:pointer; font-weight: bold;"
                                class="btn btn-reg rounded-pill d-block mx-auto mt-4 mb-3 col-12">Wyślij</button>
                        </form>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
@endsection
