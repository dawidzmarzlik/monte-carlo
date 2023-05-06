@extends('student.layout')
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Opinia</h1>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="container person-container rounded-4 px-5">
                        <h3 class="white">Podziel się z nami swoją opinią</h3>
                        <form action="" method="post">
                            <label for="opinion"></label>
                            <div class="form-floating">
                                <textarea class="form-control form-control-3 rounded-4" placeholder="Twoja opinia." id="opinion" name="opinion"
                                    style="height: 350px; background-color: transparent;"></textarea>
                            </div>

                            <button type="submit" style="cursor:pointer; font-weight: bold;"
                                class="btn btn-reg rounded-pill d-block mx-auto mt-5 mb-3 col-12">Wyślij</button>
                        </form>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
@endsection
