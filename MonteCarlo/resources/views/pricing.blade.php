@extends('layout')

@section('content')
<div class="row content">
<table class="table table-bordered rounded">
    <thead>
      <tr>
        <th scope="col">Kurs</th>
        <th scope="col">Cena</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Kategora A</th>
        <td>2000zł</td>
      </tr>
      <tr>
        <th scope="row">Kategora B</th>
        <td>2500zł</td>
      </tr>
      <tr>
        <th scope="row">Kategora C</th>
        <td>3000zł</td>
      </tr>
      <tr>
        <th scope="row">Kategora D</th>
        <td>3500zł</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection