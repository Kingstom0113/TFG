<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite('resources/css/app.scss','resources/css/app.css', 'resources/js/app.jsx')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8c76afb98d.js" crossorigin="anonymous"></script>
</head>

<body id="body-welcome">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>    
    <main class="d-flex">
        <div class="mx-auto">
            <img src="/img/logo.png" alt="Logo" id="logo">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="boton">{{ __('Home') }}</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="boton">{{ __('Logout') }}</a>
                @else
                    <a href="{{ route('login') }}" class="boton">{{ __('Loguear') }}</a>
                    <a href="{{ route('register') }}" class="boton">{{ __('Registro') }}</a>
                @endauth
            @endif
        </div>
    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    @yield('scripts')
</body>

</html>