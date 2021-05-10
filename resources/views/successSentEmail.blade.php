@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/success.css') }}">
<style>
    p{
        color: darkslategray;
        font-family: cursive;
    }
    h3{
        color: darkgreen;
        font-family: cursive;
    }

</style>
@section('title')
Success
@endsection
@section('maincontent')
    <div class="wrapper">
    <div class="container">
        <h3>Link is Successfully sent to your Email!</h3>
        <p>Please check your email to verify your email account</p>
        <a href="{{ route('base') }}"><p>Thank You!</p></a>
    </div>
</div>
@endsection
