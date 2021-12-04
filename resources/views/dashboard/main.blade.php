@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center max-w-screen-lg m-auto">
    <div class="w-full">
        <h1 class="text-4xl mb-4 font-bold">Dashboard</h1>
    </div>

    <div class="w-1/2 bg-white rounded-md p-6">    
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('usuarios') }}">
            Gestión de Usuarios
        </a>
    </div>

    <div class="w-1/2 bg-white rounded-md p-6">    
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('usuarios') }}">
            Gestión de Comunicados
        </a>
    </div>
</div>
@endsection
