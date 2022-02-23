@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center max-w-screen-xl m-auto">
    <div class="w-full">
        <h1 class="text-4xl mb-4 font-bold">Dashboard</h1>
    </div>

    <div class="w-full bg-white rounded-md p-6">
        @hasrole('Directivo')
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-1 rounded" href="{{ route('usuarios') }}">
            Usuarios
        </a>
        @endhasrole
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('comunicados') }}">
            Comunicados
        </a>
    </div>
</div>
@endsection
