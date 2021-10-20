@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-10/12 bg-white rounded-md p-6">
    <h1>Administración de usuarios</h1>
    <ul class="flex border-b">
      <li class="-mb-px mr-1">
        <a class="bg-white inline-block rounded-t py-2 px-4 text-blue-700 font-semibold" href="#">
          Listar usuarios
        </a>
      </li>
      <li class="mr-1">
        <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="{{route('admin-register')}}">
          Registrar usuario
        </a>
      </li>
    </ul>
  </div>
</div>
@endsection