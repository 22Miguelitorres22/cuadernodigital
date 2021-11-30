@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-md">
        <h1 class="text-4xl font-bold mb-4">Iniciar sesión</h1>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Nombre de usuario:</label>
                <input value="{{ old('username') }}" class="@error('username') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="text" name="username" id="username" placeholder="Tu nombre de usuario">

                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Contraseña:</label>
                <input value="{{ old('password') }}" class="@error('password') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="password" name="password" id="password" placeholder="Contraseña">

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Recordar inicio de sesión</label>
                </div>
            </div>


            @error('login_error')
            <div class="my-2 text-white text-center bg-red-300 w-full rounded-md py-2">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded-md font-bold w-full" type="submit">
                    Iniciar sesión
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
