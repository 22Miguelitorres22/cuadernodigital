@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-10/12 bg-white p-6 rounded-md">
            <h1 class="mb-4">Tabla de usuarios</h1>
            <table class="table-fixed w-full mb-4">
                <thead>
                    <th class="w-1/4 border-separate border border-black-800">Nombre y apellido</th>
                    <th class="w-1/4 border-separate border border-black-800">Nombre de usuario</th>
                    <th class="w-1/4 border-separate border border-black-800">Correo electrónico</th>
                    <th class="w-1/4 border-separate border boder-black-800">Registrado</th>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->username }}</td>
                            <td class="text-center">{{ $item->email }}</td>
                            <td class="text-center">{{$item->created_at->diffForHumans();}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <?php echo $users->appends(['sort' => 'username'])->links(); ?>
            <hr class="my-4" />
            <div class="flex">
                <button class="w-1/4 bg-red-500 text-white px-4 py-3 rounded-md font-medium" type="button"
                    onclick="window.location='{{ url('/users') }}'">< Volver</button>
            </div>
        </div>
    </div>
@endsection
