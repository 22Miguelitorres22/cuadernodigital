@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-md">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Nombre y apellido:</label>
                <input value="{{ old('name') }}" class="@error('name') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="text" name="name" id="name" placeholder="Tu nombre y apellido">

                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="sr-only">Nombre de usuario:</label>
                <input value="{{ old('username') }}" class="@error('username') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="text" name="username" id="username" placeholder="Tu nombre de usuario">

                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Correo electrónico:</label>
                <input value="{{ old('email') }}" class="@error('email') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="email" name="email" id="email" placeholder="Tu correo electrónico">

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Contraseña:</label>
                <input value="" class="@error('password') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="password" name="password" id="password" placeholder="Tu contraseña">

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Repite la contraseña:</label>
                <input value="" class="@error('password_confirmation') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu contraseña">

                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded-md font-medium w-full" type="submit">
                    Dar de alta
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
