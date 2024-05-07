<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        @vite(['resources/css/app.scss', 'resources/css/app.css', 'resources/js/app.jsx'])
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
            .container {
                 max-width: 600px;
                 margin: auto;
             }
            .card {
                 box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                 transition: 0.3s;
                 width: 100%;
             }
            .card:hover {
                 box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
             }
            .card-body {
                 padding: 2rem;
             }
            .card-body p {
                 margin-bottom: 1rem;
             }
            .card-body p strong {
                 font-weight: bold;
             }
            .card-body a {
                 color: #007bff;
                 text-decoration: none;
             }
            .card-body a:hover {
                 text-decoration: underline;
             }
         </style>
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
        <main class="container mt-5">
            <h1 class="mb-3">Perfil del Usuario</h1>
            <div class="card">
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $user->name }} <a href="#" data-bs-toggle="modal" data-bs-target="#editNameModal">Editar</a></p>
                    <p><strong>Email:</strong> {{ $user->email }} <a href="#" data-bs-toggle="modal" data-bs-target="#changeEmailModal">Editar</a></p>
                    <p><strong>Contraseña:</strong> ****** <a href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Editar</a></p>
                </div>
            </div>
        </main>
        <!-- Modal para editar el nombre -->
<div class="modal fade" id="editNameModal" tabindex="-1" aria-labelledby="editNameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNameModalLabel">Editar Nombre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update-name') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nuevo Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $user->name }}">
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
<!-- Modal -->
<div class="modal fade" id="changeEmailModal" tabindex="-1" aria-labelledby="changeEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('update-email') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="changeEmailModalLabel">Cambiar Correo Electrónico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Nuevo Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
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



<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('update-password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Contraseña Actual</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
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


        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
