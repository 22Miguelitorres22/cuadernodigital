@extends('layouts.app')

@section('content')

<div class="flex flex-wrap justify-center max-w-screen-lg m-auto">
    <div class="w-full">
        <h1 class="text-4xl mb-4 font-bold">Registrar un usuario</h1>
    </div>

    <div class="w-full rounded-md bg-white p-6">
        <form action="{{ $usuario ? route('usuarios.edit', ['id' => $usuario->id]) : route('usuarios-registro') }}" method="post">
            @csrf
            
            @if($usuario != null)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="name" class="sr-only">Nombre y apellido:</label>
                <input value="{{ $usuario ? $usuario->name : old('name') }}" class="@error('name') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="text" name="name" id="name" placeholder="Nombre y apellido">

                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="sr-only">Nombre de usuario:</label>
                <input value="{{ $usuario ? $usuario->username : old('username') }}" class="@error('username') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="text" name="username" id="username" placeholder="Nombre de usuario">

                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Correo electrónico:</label>
                <input value="{{ $usuario ? $usuario->email : old('email') }}" class="@error('email') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="email" name="email" id="email" placeholder="Correo electrónico">

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>

            @if($usuario == null)
            <div class="mb-4">
                <label for="password" class="sr-only">Contraseña:</label>
                <input autocomplete="false" value="" class="@error('password') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="password" name="password" id="password" placeholder="Contraseña">

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>

            
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Repite la contraseña:</label>
                <input autocomplete="false" value="" class="@error('password_confirmation') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite la Contraseña">

                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            @endif

            <div class="mb-4">
                <div class="inline-block relative w-full">
                    <select name="role" for="role" class="@error('role') border-red-500 @enderror block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">

                        <option value="" disabled>Seleccione una opción</option>
                        @foreach($roles as $role)
                        <!-- El valor por defecto a mostrar es ALUMNO, cuyo ID es 4 -->
                        <option value="{{$role->name}}" {{$role->id === 4 ? 'selected' : ''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex">
                <button class="bg-blue-500 text-white py-3 mr-1 w-1/2 rounded-md font-bold" type="submit">
                    Registrar
                </button>
                <button class="bg-red-500 text-white py-3 w-1/2 rounded-md font-bold" type="button" onclick="window.location='{{ url()->previous() }}'">
                    Volver
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
