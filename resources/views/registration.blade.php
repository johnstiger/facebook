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
            margin-bottom: 20px;
            outline: none;
        }
        #gender{
            margin-bottom: 25px;
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
    </style>
</head>
<body>
    <div class="wrapper">
    <div class="container">
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="post">
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
            <input type="email" placeholder="Email Address"  name="email" value="{{ $email }}">
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
</body>
</html>
