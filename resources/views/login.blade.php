@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@section('title')
Login
@endsection
@section('maincontent')
    <div class="wrapper">
    <div class="container">
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input type="email" placeholder="Email Address" name="email">
            @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
            @endif
            <br>
            <input type="password" placeholder="Password" name="password">
            @if($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
            @endif
            <br>
            <button type="submit">Login</button>
            or
            <div class="facebook">
                <a class="btn" href="{{ url('auth/redirect') }}"
                    >
                    Login with Facebook
                </a>
            </div>
            <p><a href="#" class="register">Forget Password</a></p>
            <p>Don't have an account? <a href="{{ route('registerHere') }}" class="register">Register Here!</a></p>
        </form>
    </div>
    </div>
@endsection
</body>
</html>
