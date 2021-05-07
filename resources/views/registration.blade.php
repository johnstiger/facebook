@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@section('title')
Registration
@endsection
@section('maincontent')
    <div class="wrapper">
    <div class="container">
        <h1>Register</h1>
        <form action="{{ route('register',$user) }}" method="post">
            @csrf
            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif
            <br>
            <input type="number" placeholder="Age" name="age"  value="{{ old('age') }}">
            <br>
            <label for="">Gender:</label>
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br>
            <input type="date" placeholder="Birthdate" name="birthday" value="{{ old('birthday') }}">
            <br>
            <input type="email" placeholder="Email Address"  name="email" value="{{ $user->email }}">
            @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
            @endif
            <br>
            <input type="password" placeholder="Password" name="password" value="{{ old('password') }}">
            @if($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
            @endif
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
