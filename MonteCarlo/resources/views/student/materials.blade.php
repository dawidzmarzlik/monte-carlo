@extends('student.layout')
@section('content')
    <div class="m-auto">
        <div class="row align-items-center m-auto">
            <div class="col ps-0">
                <h1 class="white">Materiały dydaktyczne</h1>
            </div>
        </div>
        <div class="row align-items-center m-auto">
            <div class="col">

            </div>
            <div class="col-md-8 col-lg-6">
                <div class="table-responsive rounded-4 mt-2">
                    <table class="table table-hover align-middle text-start table-borderless admin-table m-auto">
                        <thead>
                            <tr>
                                <th scope="col">Tytuł</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Wiadomości ogólne</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'wiadomosci_ogolne.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Podstawowe manewry na drodze</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'podstawowe_manewry_na_drodze.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Przecinanie się kierunków ruchu</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'przecinanie_sie_kierunkow_ruchu.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prędkość pojazdu i hamowanie</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'predkosc_pojazdu_i_hamowanie.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Rodzaje znaków drogowych</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'rodzaje_znakow_drogowych.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Uprawnienia, obowiązki i odpowiedzialność kierowcy i właściciela pojazdu</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'uprawnienia.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Przewóz pasażerów i ładunków, jazda z przyczepą</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'przewoz_pasazerow_i_ladunkow.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Przygotowanie do jazdy</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'przygotowanie_do_jazdy.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Budowa pojazdu - wiadomości ogólne</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'budowa_pojazdu.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Wpływ alkoholu, leków i narkotyków na bezpieczeństwo w ruchu drogowym</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'wplyw_uzywek.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Pierwsza pomoc</td>
                                <td class="text-end">
                                    <a class="btn btn-add" href="{{ route('student.show_material', ['pdf' => 'pierwsza_pomoc.pdf']) }}">Zobacz</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
