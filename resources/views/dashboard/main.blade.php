@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-10/12 bg-white rounded-md p-6">
        <h1 class="text-4xl mb-4 font-bold">Dashboard</h1>
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('usuarios') }}">
            Gestión de Usuarios
        </a>
    </div>
</div>
@endsection
