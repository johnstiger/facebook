<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="https://cdn1.vectorstock.com/i/1000x1000/12/90/welcome-poster-with-brush-strokes-vector-21131290.jpg" alt="">
                </div>
                <div class="col">
                    {{ $user }}
                    {{-- <input type="text" value="{{ $user->name }}">
                    <input type="text" value="{{ $user->age }}">
                    <input type="text" value="{{ $user->gender }}">
                    <input type="text" value="{{ $user->birthday }}">
                    <input type="text" value="{{ $user->email }}"> --}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
