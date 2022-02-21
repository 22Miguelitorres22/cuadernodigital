<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I.S.F.T. N° 177 - Cuaderno Digital</title>
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="{{ asset('css/app.css'); }}">
</head>
<body class="bg-gray-200">
    <!-- Navbar -->
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a class="text-4xl font-bold" href="{{ route('dashboard') }}" class="p-3">I.S.F.T. N° 177 | Cuaderno Digital</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li>
                    Sesión iniciada como: <a href="{{ route('dashboard') }}" class="p-3 font-bold">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="p-3">Cerrar la sesión</button>
                    </form>
                </li>
            @endauth

            @guest
            <li>
                <a href="{{ route('register') }}" class="p-3">Registrarse</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="p-3">Iniciar sesión</a>
            </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>
