<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <h1>Rentacar</h1>
<div class="login-div">

    <form method="post" action="/login">
        @csrf
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" />
        </div>
        <div>
            <label for="password">Password</label> 
            <input name="password" id="password" type="password" />
        </div>
        <label for="remember">Remember Me:</label>
        <input type="checkbox" id="remember" name="remember">

        <button type="submit">Login</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>


</body>

</html>
