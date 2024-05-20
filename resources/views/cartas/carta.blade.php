<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menus</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @viteReactRefresh
    @vite(['resources/css/app.scss', 'resources/css/app.css', 'resources/js/app.jsx'])
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body id="body-welcome">
    <header>
        <nav class="navbar navbar-expand-lg nav-main">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/img/logo.png" alt="Logo" class="logo-navbar">
                </a>
                <!-- Offcanvas Sidebar -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Menú Principal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="/">{{ __('Inicio') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/home') }}" class="nav-link">{{ __('Home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('profile') }}" class="nav-link">{{ __('Perfil') }}</a>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="accordion" id="CategoriasAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button visible-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Categorias
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#CategoriasAccordion">
                                <div class="accordion-body">
                                    <div id="react-category-creator"></div>
                                    <div id="react-category-list"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion" id="PlatosAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button visible-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Platos
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#PlatosAccordion">
                                <div class="accordion-body">
                                    <div id="react-root"></div>
                                    <div id="react-lista-platos"></div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-8">

                </div>
            </div>
        </div>
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       $(document).ready(function() {
    $('.accordion-button').click(function(e) {
        e.preventDefault(); // Evita el comportamiento predeterminado de Bootstrap

        var $this = $(this);
        var $target = $($this.data('bs-target'));

        // Colapsa todos los demás acordeones
        $('.accordion-collapse.show').not($target).collapse('hide');

        // Muestra u oculta el acordeón seleccionado
        if ($target.hasClass('show')) {
            $target.collapse('hide');
        } else {
            $target.collapse('show');
        }
    });
});



    </script>
</body>

</html>
