@extends('layouts.master')

@section('form')
    <form method='GET' action='/convert'>
        <input type='hidden' name='timeValue' value='{{$timeValue }}'>

        <label>Enter currency amount:
            <input type='text' name='amount' id='amount' value='{{old('amount', $amount)}}'/>
        </label>
        <br>
        @if($errors->get('amount'))
            <div class='error'>{{ $errors->first('amount') }}</div>
        @endif
        <br>
        <label>Choose currency:
            <select name='current' id='current'>
                @foreach ($currency_list as $code => $value)
                    <option value='{{ $code }}'
                    @if ($code == old('current', $current))
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
            {{$i = 0}}
                @foreach ($currency_list as $code => $value)
                    <option value='{{ $i }}'
                    @if ($i++ == old('target', $target))
                        {{'selected'}}
                    @endif
                    >{{$value}}</option>
                @endforeach
            </select>
        </label>
        <br>
        <br>
        <label>
            Round value to nearest whole number?
            <input type='checkbox' name='round' id='round' value='true'
            @if(old('round', $round))
                {{'checked'}}
            @endif
            >
        </label>
        <br>
        <br>
        <input type='submit' value='Convert' >
    </form>
    <br>
    <br>
    @if (isset($converted) && (!isset($errors) || count($errors) == 0))

        <div class='alert alert-info'>
            The converted amount is: {{$converted }}
        </div>
    @endif
@endsection







