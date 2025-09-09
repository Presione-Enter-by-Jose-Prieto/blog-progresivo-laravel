@extends('layouts.app')

@section('title', 'Registro de Profesores')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50 p-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-6 md:p-8">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Registro de Profesor</h1>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-3 py-2 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-3 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-3 py-2 rounded mb-4 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profesores.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
            @csrf

            <div>
                <label class="block text-gray-700 text-sm mb-1">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                    class="w-full px-3 py-1.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-1">Apellido</label>
                <input type="text" name="apellido" value="{{ old('apellido') }}" required
                    class="w-full px-3 py-1.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-1.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-1">Contraseña</label>
                <input type="password" name="password" required
                    class="w-full px-3 py-1.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-1">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-3 py-1.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-1">Especialidad</label>
                <input type="text" name="especialidad" value="{{ old('especialidad') }}"
                    class="w-full px-3 py-1.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-1">Titular de Curso Académico (opcional)</label>
                <input type="text" name="curso_titular" value="{{ old('curso_titular') }}" placeholder="Ej: 11-01"
                    class="w-full px-3 py-1.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm">
            </div>

            <div>
                <label class="block text-gray-700 text-sm mb-1">Foto de Perfil</label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full px-3 py-1.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-sm">
            </div>

            <button type="submit"
                class="w-full py-2 mt-1 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-xl shadow-md text-sm transition-transform transform hover:scale-105">
                Registrar
            </button>
        </form>
    </div>
</div>
@endsection
