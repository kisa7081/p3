@extends('index')
@section('convert')
<br>
<br>
@if (isset($converted))

    <div class='alert alert-info'>
        The converted amount is: {{$converted }}
    </div>

@endif
@if ($hasErrors)
    <div class='alert alert-danger'>
        @foreach ($errors as $error)
            {{ $error }}
            <br>
        @endforeach
    </div>
@endif
@endsection