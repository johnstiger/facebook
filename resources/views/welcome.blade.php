<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
       table{
           padding:25px;
           border:1px solid;
           border-radius: 10px;
       }
       .nav{
            padding: 20px;
            box-shadow: 1px 1px 5px dimgrey;
       }
       a{
            text-decoration: none;
            color: cadetblue;
            font-family: cursive;
       }

       a:hover{
           color: blue;
       }
    </style>
</head>
<body>
    <div class="nav">
        <div class="header">
            <a href="{{ route('base') }}">Logout</a>
        </div>
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
</body>
</html>
