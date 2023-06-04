@extends('student.layout')
@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col-md-8 col-lg-6">
        <div class="ratio ratio-4x3  d-flex justify-content-center align-items-center" style="max-height: 90vh; overflow: auto;">
            <iframe class="" src="{{ asset('/laraview/#..' . $pdfPath) }}"></iframe>
        </div>
    </div>
    <div class="col"></div>
</div>
@endsection