@extends('layouts.master')

@section('form')
    <form method='GET' action='convert'>
        <input type='hidden' name='timeValue' value='{{$timeValue }}'>

        <label>Enter currency amount:
            <input type='text' name='amount' id='amount' value='{{$amount}}'/>
        </label>
        <br>
        <br>
        <label>Choose currency:
            <select name='current' id='current'>
                @foreach ($currency_list as $code => $value)
                <option value='{{ $code }}'
                @if ($code == $current)
                    {{'selected'}}
                        @endif
                >{{$value}}</option>
                @endforeach
            </select>
        </label>
        <br>
        <br>
        <label>Choose currency to convert to:
            <select name='target' id='target'>
                @for ($i = 0; $i < sizeof($currency_list); $i++)
                    <option value='{{ $i }}'
                    @if ($i == $target) {{'selected'}}>
                        @endif
                        {{ $value }}</option>
                @endfor
            </select>
        </label>
        <br>
        <br>
        <label>
            Round value to nearest whole number?
            <input type='checkbox' name='round' id='round' value='true'
            @if ($round)
                {{'checked'}}
                    @endif
            >
        </label>
        <br>
        <br>
        <input type='submit' value='Convert' >
    </form>
@endsection


@yield('convert')




