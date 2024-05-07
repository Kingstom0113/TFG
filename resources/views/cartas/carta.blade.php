<!DOCTYPE html>
<html lang="en">
    <head>
        <title>home</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        @vite(['resources/css/app.scss','resources/css/app.css', 'resources/js/app.js'])
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
    </head>
    <body id="body-welcome">
        <header>
            <nav class="navbar navbar-expand-lg nav-main">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <img src="/img/logo.png" alt="Logo" class="logo-navbar">
                    </a>
                    <!-- Offcanvas Sidebar -->
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="sidebarMenuLabel">Menú Principal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav">
                                @if (Route::has('login'))
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="/">{{ __('Inicio') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/home') }}" class="nav-link">{{ __('Perfil') }}</a>
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
                </div>
            </nav>
        </header>
        <main class="m-0 p-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div id="react-root"></div>
                    </div>
                    <div class="col-md-8">
                        
                    </div>
                </div>
            </div>
        </main>
        
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
    </body>
</html>