@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center max-w-screen-lg m-auto">
  <div class="w-full">
      <h1 class="text-4xl mb-4 font-bold">Gestión de usuarios</h1>
  </div>

  <div class="w-full rounded-md bg-white p-6">
    <ul class="flex">
      <li>
        <a class="inline-block rounded-t py-2 text-blue-700 font-semibold" href="{{route('usuarios.list')}}">
          Listar usuarios
        </a>
      </li>
      <li class="ml-2">
        <a class="inline-block py-2 text-blue-500 hover:text-blue-800 font-semibold" href="{{route('usuarios-registro')}}">
          Registrar usuario
        </a>
      </li>
    </ul>
  </div>
</div>
@endsection
