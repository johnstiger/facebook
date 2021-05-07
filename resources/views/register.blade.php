@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@section('title')
Register
@endsection
@section('maincontent')
    <div class="wrapper">
    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        <h1>Register</h1>
        <form action="{{ route('sendEmail') }}" method="post">
            @csrf
            <input type="email" id="email" placeholder="Email Address" name="email">
            @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
            @endif
            <button type="submit">Submit</button>
            <div class="cancel">
                <a href="{{ route('base') }}" >Cancel</a>
            </div>
            <br>
            <br>
        </form>
    </div>
</div>
@endsection
