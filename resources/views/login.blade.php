<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border: none;
            box-shadow: 2px 2px 5px dimgrey;
        }
        .container input{
            margin-bottom: 20px;
            border: none;
            border-bottom: 1px solid;
            border-radius: 0px !important;
            padding: 10px;
            width: 200px;
            outline: none;
        }
        .container input[type="text"]{
            margin-bottom: 20px;
            border: none;
            border-bottom: 1px solid;
            border-radius: 0px !important;
            padding: 10px;

        }
        button{
            padding: 10px;
            width: 100%;
            margin-top: 30px;
            background-color: darkgreen;
            border: none;
            border-radius: 10px;
            color: white;
            cursor: pointer;
        }
        .password{
            margin-left: 20px;
        }
        .facebook{
            margin-top: 9px;
            padding: 8px;
            background-color: rgb(9, 124, 231);
            border-radius: 10px;
            font-family: -webkit-pictograph;
        }
        a{
            text-decoration: none;
            color: white;
        }

        .error{
            color: red;
            font-size: 12px;
        }
        .register{
            color: blue;
            font-family: cursive;
            font-size: 14px;
        }
    </style>
</head>
<body>
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
            <div class="error">{{ $errors->first('password') }}</div>
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
            <p>Don't have an account? <a href="{{ route('registerHere') }}" class="register">Register Here!</a></p>
        </form>
    </div>
    </div>
</body>
</html>
