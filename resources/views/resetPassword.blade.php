@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@section('title')
Registration
@endsection
@section('maincontent')
    <div class="wrapper">
    <div class="container">
        <h1>Enter new Password</h1>
        <form action="{{ route('reset',$user) }}" method="post">
            @csrf
            <input type="password" placeholder="Password" name="password" value="{{ old('password') }}">
            @if($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
            @endif
            <br>
            <input type="password" placeholder="Confirm Password" name="password_confirmation" value="{{ old('password') }}">
            @if($errors->has('password_confirmed'))
            <div class="error">{{ $errors->first('password_confirmation') }}</div>
            @endif
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
