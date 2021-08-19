<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style type="text/css">
        .fail {width:200px; margin:20px auto; color: red; }
        form {font-size:16px; color:#999; font-weight:bold ;}
        form {width:300px; margin:50px auto; padding: 10px; border:1px dotted #ccc; }
        form input[type="text"], form input[type="password"] {margin: 2px 0 20px; color:#999; }
        form input[type="submit"] {width: 100%; height: 30px; color: #666; font-size: 16px; }
        </style>
    </head>
    <body>
        <main class="form-signin">
                @if ($errors->has('fail'))
                    <div class="fail">{{ $errors->first('fail') }}</div>
                @endif

                <div class="form-floating">

                {{ Form::open(['url'=>'login', 'method'=>'post']) }}
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password')}}
                    {{ Form::submit('登入') }}
                    {{ Form::close() }}

                </div>



        </main>
    </body>
</html>
