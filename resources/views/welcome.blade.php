@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@section('title')
Welcome
@endsection
@section('maincontent')
    <div class="nav">
        <div class="header">
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
    <div class="welcome">
        <div class="message">Welcome {{ $user->name }}!</div>
    </div>
    <div class="wrapper">
    <div class="container">
       <table>
           <thead>
               <tr>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Age</th>
                   <th>Gender</th>
                   <th>Birthday</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->age }}</td>
                   <td>{{ $user->gender }}</td>
                   <td>{{ $user->birthday }}</td>
               </tr>
           </tbody>
       </table>
    </div>
    </div>
@endsection
