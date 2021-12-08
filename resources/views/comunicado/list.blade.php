@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center max-w-screen-lg m-auto">
    <div class="w-full">
        <h1 class="text-4xl mb-4 font-bold">Lista de usuarios</h1>
    </div>

    <div class="w-full rounded-md bg-white p-6">
        <table class="w-full mb-4 border-collapse ">
            <thead>
                <th class="p-2 w-1/4 border border-black-800">Nombre y apellido</th>
                <th class="p-2 w-1/4 border border-black-800">Nombre de usuario</th>
                <th class="p-2 w-1/4 border border-black-800">Correo electrónico</th>
                <th class="p-2 w-1/4 border boder-black-800">Registrado</th>
                <th class="p-2 w-1/4 border boder-black-800">Acciones</th>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr class="border">
                        <td class="p-2 text-center">{{ $item->name }}</td>
                        <td class="p-2 text-center">{{ $item->username }}</td>
                        <td class="p-2 text-center">{{ $item->email }}</td>
                        <td class="p-2 text-center">{{ $item->created_at->diffForHumans() }}</td>
                        <td class="py-2 px-1 text-center">
                            <a class=" hover:underline text-blue-500" href="{{ route('usuarios.edit', ['id' => $item->id]) }}">
                                Editar
                            </a>

                            <form action="{{ route('usuarios.destroy', $item) }}" method="POST">
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
        <?php echo $users->appends(['sort' => 'username'])->links(); ?>
        <div class="flex">
            <button class="w-1/4 bg-red-500 text-white px-4 py-3 rounded-md font-bold" type="button"
                onclick="window.location='{{ url('/usuarios') }}'">Volver</button>
        </div>
    </div>
</div>
@endsection
