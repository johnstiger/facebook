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
            text-align: center;
            border: none;
            border-radius: 10px;
            box-shadow: 1px 1px 5px dimgrey;
        }
        .container input{
            padding: 7px;
            border-style: solid;
            border: none;
            border-bottom: 1px solid;
            border-radius: 0px;
            width: 230px;
            outline: none;
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
        }
        a{
            text-decoration: none;
            color: white;
        }
        .error{
            color: red;
            font-size: 12px;
        }
        .success{
            color: green;
            font-size: 12px;
        }
        #resend{
            display: none;
        }

        .cancel{
            background: yellow;
            padding: 8px;
            border-radius: 10px;
            margin-top: 10px;
        }
        .cancel a{
            color: black;
        }

    </style>
</head>
<body>
    <div class="wrapper">
    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        <h1>Register</h1>
        <form action="{{ route('sendEmail') }}" method="post">
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
</body>
</html>
