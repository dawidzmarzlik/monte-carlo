@extends('student.layout')
@section('content')
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8 col-lg-6">
            <div class="ratio ratio-4x3" style="max-height: 90vh;">
                <iframe class="" src="{{ asset('/laraview/#..' . $pdfPath) }}"></iframe>
            </div>
        </div>
        <div class="col"></div>
    </div>
@endsection
