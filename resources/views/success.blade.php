<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
    <style>
        .wrapper{
            justify-content: center;
            align-content: center;
            display: grid;
            width: 100vw;
            position: fixed;
            height: 100vh;
        }
        .container{
            width: auto;
            padding: 40px;
            text-align: center;
            border: none;
            border-radius: 10px;
            box-shadow: 1px 1px 5px dimgrey;
        }

        .login{
            padding: 10px;
            width: 100%;
            margin-top: 30px;
            background-color: darkgreen;
            border: none;
            border-radius: 10px;
            color: white;
            cursor: pointer;
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <div class="container">
        <h1>Successs</h1>
        <div class="login">
            <a href="{{ route('base') }}">
            Top
            </a>
        </div>
    </div>
</div>
</body>
</html>
