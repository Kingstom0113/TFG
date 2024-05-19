<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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

        .form-control {
            border-color: var(--azul-claro);
        }

        .form-check-label, .form-label {
            color: var(--azul-oscuro);
        }
    </style>
</head>
<body id="body-welcome">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card w-50">
            <div class="card-header bg-azul-medio text-white">
                Login
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-naranja">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

