@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/success.css') }}">
@section('title')
Success
@endsection
@section('maincontent')
    <div class="wrapper">
    <div class="container">
        <h1>Success!</h1>
        <p>Please Click Top Button To Login</p>
        <div class="login">
            <a href="{{ route('base') }}">
            Top
            </a>
        </div>
    </div>
</div>
@endsection
