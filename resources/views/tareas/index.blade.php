@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Tareas</h1>
        <form action="{{ route('tareas.store') }}" method="POST" class="flex items-center mb-4">
            @csrf
            <input type="text" name="descripcion" placeholder="Nueva tarea" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            <button type="submit" class="ml-4 px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">Agregar</button>
        </form>
        <ul class="list-disc pl-5 space-y-2">
            @foreach ($tareas as $tarea)
                <li class="flex justify-between items-center bg-gray-100 px-4 py-2 rounded-lg">
                    <span>{{ $tarea->descripcion }}</span>
                    <div>
                        <a href="{{ route('tareas.edit', $tarea) }}" class="mr-2 px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Editar</a>
                        <form action="{{ route('tareas.toggle', $tarea) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="mr-2 px-4 py-2 {{ $tarea->completed ? 'bg-green-500' : 'bg-gray-500' }} text-white rounded-lg hover:bg-green-600">
                                {{ $tarea->completed ? 'Completa' : 'Incompleta' }}
                            </button>
                        </form>
                        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection