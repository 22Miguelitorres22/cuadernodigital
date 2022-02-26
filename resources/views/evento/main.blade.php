@extends('layouts.app')
@section('content')
<div class="flex flex-wrap justify-center max-w-screen-xl m-auto">
  <div class="w-full">
      <h1 class="text-4xl mb-4 font-bold">Gestión de eventos</h1>      
  </div>
  <div class="w-full rounded-md bg-white px-6 py-2 mb-4">
    <ul class="flex">
        @hasrole('Directivo')
        <li>
            <a class="inline-block rounded-t py-2 text-blue-700 font-semibold" href="{{ route('eventos.create') }}">
            Crear un evento
            </a>
        </li>
        @else
        <li>
            Para crear o modificar un evento, inicie sesión con un usuario con privilegios directivos
        </li>
        @endhasrole
    </ul>
  </div>
  <div class="w-full rounded-md bg-white p-6">
        <table class="w-full mb-4 border-collapse ">
            <thead>
                <th class="p-2 w-1/5 border border-black-800">Tipo de evento</th>
                <th class="p-2 w-1/5 border border-black-800">Contenido</th>
                <th class="p-2 w-1/5 border border-black-800">Fecha del evento</th>
                <th class="p-2 w-1/5 border border-black-800">Creado por</th>
                @hasrole('Directivo')
                <th class="p-2 w-1/5 border boder-black-800">Acciones</th>
                @endhasrole
            </thead>
            <tbody>
                @foreach ($eventos as $item)
                    <tr class="border">
                        <td class="p-2 text-center">{{ $item->tipo_evento }}</td>
                        <td class="p-2 text-center">{{ $item->contenido }}</td>
                        <td class="p-2 text-center">{{ date('d-m-Y', strtotime($item->fecha)) }}</td>
                        <td class="p-2 text-center">{{ $item->user_id }}</td>                        
                        @hasrole('Directivo')
                        <td class="py-2 px-1 text-center"> 
                            @unlessrole('Directivo')
                                @if($item->user_id == Auth::user()->id)                            
                                <a class="hover:underline text-blue-500" href="{{ route('eventos.edit', $item) }}">
                                    Editar
                                </a>
                                @endif
                            @else
                                <a class="hover:underline text-blue-500" href="{{ route('eventos.edit', $item) }}">
                                    Editar
                                </a>
                            @endunlessrole

                            
                            <form action="{{ route('eventos.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:underline text-red-500">
                                    Eliminar
                                </button>
                            </form>
                            
                        </td>
                        @endhasrole
                    </tr>
                @endforeach
            </tbody>
        </table>
        <?php echo $eventos->appends(['sort' => 'user_id'])->links(); ?>
        <div class="flex">
            <button class="w-1/4 bg-red-500 text-white px-4 py-3 rounded-md font-bold" type="button"
                onclick="window.location='{{ url('/dashboard') }}'">Volver</button>
        </div>
    </div>
</div>
@endsection
