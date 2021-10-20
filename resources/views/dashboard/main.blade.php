@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-10/12 bg-white rounded-md p-6">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('users') }}">
            Usuarios
        </a>
    </div>
</div>
@endsection