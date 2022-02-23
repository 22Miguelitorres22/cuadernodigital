@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center max-w-screen-xl m-auto">
    <div class="w-full mb-4">
        <h1 class="text-4xl mb-2 font-bold">Dashboard</h1>
        <p>Clickear en los botones a continuación para acceder al módulo correspondiente</p>
    </div>

    <div class="w-full bg-white rounded-md p-6">
        @hasrole('Directivo')
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-1 rounded" href="{{ route('usuarios') }}">
            Usuarios
        </a>
        @endhasrole
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-1 rounded" href="{{ route('comunicados') }}">
            Comunicados
        </a>
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('eventos') }}">
            Eventos
        </a>
    </div>
</div>
@endsection
