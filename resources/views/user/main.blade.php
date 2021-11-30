@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-10/12 bg-white rounded-md p-6">
    <h1 class="text-4xl mb-4 font-bold">Gestión de usuarios</h1>
    <ul class="flex border-b">
      <li>
        <a class="bg-white inline-block rounded-t py-2 text-blue-700 font-semibold" href="{{route('usuarios-lista')}}">
          Listar usuarios
        </a>
      </li>
      <li class="ml-2">
        <a class="bg-white inline-block py-2 text-blue-500 hover:text-blue-800 font-semibold" href="{{route('usuarios-registro')}}">
          Registrar usuario
        </a>
      </li>
    </ul>
  </div>
</div>
@endsection
