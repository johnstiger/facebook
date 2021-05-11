@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@section('title')
Registration
@endsection
@section('maincontent')
    <div class="wrapper">
    <div class="container">
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        <h1>Sending Email</h1>
        <form action="{{ route('send') }}" method="post">
            @csrf
            <input type="email" placeholder="Send to.." name="email" value="{{ old('email') }}">
            <br>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
            <br>
            <button type="submit">Send</button>
        </form>
    </div>
</div>
@endsection
