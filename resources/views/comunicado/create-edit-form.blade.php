@extends('layouts.app')

@section('content')

<div class="flex flex-wrap justify-center max-w-screen-lg m-auto">
    <div class="w-full">
        <h1 class="text-4xl mb-4 font-bold">
            @if($comunicado)
            Editar un comunicado
            @else
                Crear un comunicado
            @endif
        </h1>
    </div>

    <div class="w-full rounded-md bg-white p-6">
        <form action="{{ $comunicado ? route('comunicados.edit', ['id' => $comunicado->id]) : route('comunicados.create') }}" method="post">
            @csrf

            @if($comunicado != null)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="contenido" class="sr-only">Contenido:</label>
                <input value="{{ $comunicado ? $comunicado->contenido : old('contenido') }}" class="@error('contenido') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="text" name="contenido" id="contenido" placeholder="Contenido">

                @error('contenido')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-4">
                <div class="inline-block relative w-full">
                    <select name="destination_user_id" for="destination_user_id" class="@error('destination_user_id') border-red-500 @enderror block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">

                        <option value="" disabled>Elija el usuario destinatario</option>
                        @foreach($usuarios as $usuario)
                            @if($comunicado)
                            <option value="{{ $usuario->id }}"  {{ $usuario->id === $comunicado->destination_user_id ? 'selected' : ''}}>{{ $usuario->name }}</option>
                            @else
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endif
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
                    Guardar
                </button>
                <button class="bg-red-500 text-white py-3 w-1/2 rounded-md font-bold" type="button" onclick="window.location='{{ url()->previous() }}'">
                    Volver
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
