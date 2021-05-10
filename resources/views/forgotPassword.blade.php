@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@section('title')
Forgot Password
@endsection
@section('maincontent')
    <div class="wrapper">
    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        <h1>Forgot Password</h1>
        <form action="{{ route('sendToEmail') }}" method="post">
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
