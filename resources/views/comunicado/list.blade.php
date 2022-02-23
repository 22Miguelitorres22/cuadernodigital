@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center max-w-screen-lg m-auto">
    <div class="w-full">
        <h1 class="text-4xl mb-4 font-bold">Lista de comunicados</h1>
    </div>

    <div class="w-full rounded-md bg-white p-6">
        <table class="w-full mb-4 border-collapse ">
            <thead>
                <th class="p-2 w-1/5 border border-black-800">Creador</th>
                <th class="p-2 w-1/5 border border-black-800">Destinatario</th>
                <th class="p-2 w-1/5 border border-black-800">Contenido</th>
                <th class="p-2 w-1/5 border border-black-800">Creado</th>
                <th class="p-2 w-1/5 border boder-black-800">Acciones</th>
            </thead>
            <tbody>
                @foreach ($comunicados as $item)
                    <tr class="border">
                        <td class="p-2 text-center">{{ $item->user_id }}</td>
                        <td class="p-2 text-center">{{ $item->destination_user_id }}</td>
                        <td class="p-2 text-center">{{ $item->contenido }}</td>
                        <td class="p-2 text-center">{{ $item->created_at->diffForHumans() }}</td>
                        <td class="py-2 px-1 text-center"> 
                            @if($item->user_id == Auth::user()->id)
                            <a class="hover:underline text-blue-500" href="{{ route('comunicados.edit', $item) }}">
                                Editar
                            </a>
                            @endif

                            <form action="{{ route('comunicados.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:underline text-red-500">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <?php echo $comunicados->appends(['sort' => 'user_id'])->links(); ?>
        <div class="flex">
            <button class="w-1/4 bg-red-500 text-white px-4 py-3 rounded-md font-bold" type="button"
                onclick="window.location='{{ url('/comunicados') }}'">Volver</button>
        </div>
    </div>
</div>
@endsection
