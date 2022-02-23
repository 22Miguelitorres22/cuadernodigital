@extends('layouts.app')
@section('content')
<div class="flex flex-wrap justify-center max-w-screen-lg m-auto">
    <div class="w-full">
        <h1 class="text-4xl mb-4 font-bold">
            @if($evento)
            Editar un evento
            @else
                Crear un evento
            @endif
        </h1>
    </div>

    <div class="w-full rounded-md bg-white p-6">
        <form action="{{ $evento ? route('eventos.edit', ['id' => $evento->id]) : route('eventos.create') }}" method="post">
            @csrf

            @if($evento != null)
                @method('PUT')
            @endif

            <div class="mb-4">
                <div class="inline-block relative w-full">
                    <label for="contenido" class="sr-only">Tipo de evento:</label>
                    <input value="{{ $evento ? $evento->tipo_evento : old('tipo_evento') }}" class="@error('tipo_evento') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="date" name="tipo_evento" id="tipo_evento" placeholder="Tipo de evento">
                    @error('contenido')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="contenido" class="sr-only">Contenido:</label>
                <input value="{{ $evento ? $evento->contenido : old('contenido') }}" class="@error('contenido') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-md" type="text" name="contenido" id="contenido" placeholder="Contenido">
                @error('contenido')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
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
