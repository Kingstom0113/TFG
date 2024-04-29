<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite('resources/scss/app.scss', 'resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8c76afb98d.js" crossorigin="anonymous"></script>
</head>

<body>


    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/img/logo.png" alt="Logo" width="200px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        @if (Route::has('login'))
                            @auth
                                @if (auth()->user()->hasRole('admin'))
                                    <li class="nav-item">
                                        <a href="{{ route('admin.index') }}"
                                            class="nav-link">{{ __('Panel de Administración') }}</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">{{ __('Inicio') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/home') }}" class="nav-link">{{ __('Mi cuenta') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">{{ __('Iniciar sesión') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">{{ __('Registro') }}</a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    @yield('scripts')
</body>

</html>