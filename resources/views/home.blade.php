<!doctype html>
<html lang="en">

<head>
    <title>home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
                                        <a href="{{ url('/home') }}" class="nav-link">{{ __('home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('profile')}}" class="nav-link">{{ __('Perfil')}}</a>
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
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Mis Cartas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @viteReactRefresh
    @vite(['resources/css/app.scss', 'resources/css/app.css', 'resources/js/app.jsx'])
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .bg-azul-medio {
            background-color: var(--azul-medio) !important;
        }

        .text-white {
            color: var(--blanco) !important;
        }

        .btn-naranja {
            background-color: var(--naranja) !important;
            color: var(--blanco) !important;
        }

        .btn-azul-medio {
            background-color: var(--azul-medio) !important;
            color: var(--blanco) !important;
        }

        .form-control {
            border-color: var(--azul-claro);
        }

        .form-check-label, .form-label {
            color: var(--azul-oscuro);
        }

        .card {
            border-color: var(--azul-claro);
        }

        .card-title {
            color: var(--azul-oscuro);
        }

        .card-text {
            color: var(--azul-medio);
        }

        .modal-header {
            background-color: var(--azul-medio);
            color: var(--blanco);
        }

        .modal-footer .btn-secondary {
            background-color: var(--azul-claro);
            border-color: var(--azul-claro);
        }

        .modal-footer .btn-secondary:hover, .modal-footer .btn-secondary:focus, .modal-footer .btn-secondary:active {
            background-color: var(--azul-medio);
            border-color: var(--azul-medio);
        }
    </style>
</head>
<body id="body-welcome">
    <main>
        <div class="container text-center mt-5">
            <h1>Bienvenido {{ auth()->user()->name }}</h1>
            <h2>Mis Cartas</h2>
            <div>
                <button type="button" class="btn btn-naranja" data-bs-toggle="modal" data-bs-target="#crearCartaModal">
                    Crear Nueva Carta
                </button>
                @if ($cartas->isNotEmpty())
                    <div class="row mt-3">
                        @foreach ($cartas as $carta)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <div class="card" style="cursor: pointer;" onclick="window.location='{{ route('cartas.show', $carta->id) }}'">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $carta->nombre }}</h5>
                                    <p class="card-text">{{ $carta->descripcion }}</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editCartaModal" data-id="{{ $carta->id }}"
                                        data-nombre="{{ $carta->nombre }}"
                                        data-descripcion="{{ $carta->descripcion }}"
                                        onclick="event.stopPropagation();">
                                        Editar
                                    </button>
                                    <form action="{{ route('cartas.destroy', $carta) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="event.stopPropagation(); return confirmDelete();">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>                        
                        @endforeach
                    </div>
                @else
                    <p class="mt-3">No tienes cartas creadas.</p>
                @endif
            </div>
        </div>
        <!-- Modal para crear una nueva carta -->
        <div class="modal fade" id="crearCartaModal" tabindex="-1" aria-labelledby="crearCartaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearCartaModalLabel">Nueva Carta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('cartas.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Carta</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Carta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal para Editar Carta -->
        <div class="modal fade" id="editCartaModal" tabindex="-1" aria-labelledby="editCartaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" id="editCartaForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCartaModalLabel">Editar Carta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="edit_descripcion" name="descripcion"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        function confirmDelete() {
            return confirm('¿Estás seguro de que deseas eliminar esta carta? Esta acción no se puede deshacer.');
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editCartaModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var nombre = button.getAttribute('data-nombre');
                var descripcion = button.getAttribute('data-descripcion');

                var modalTitle = editModal.querySelector('.modal-title');
                var form = document.getElementById('editCartaForm');
                var inputNombre = editModal.querySelector('#edit_nombre');
                var inputDescripcion = editModal.querySelector('#edit_descripcion');

                modalTitle.textContent = 'Editar Carta: ' + nombre;
                form.action = '/cartas/' +
                id;
                inputNombre.value = nombre;
                inputDescripcion.value = descripcion;
            });
        });
    </script>


</body>

</html>
