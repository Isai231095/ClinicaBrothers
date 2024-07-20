<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <!-- Botón para agregar usuarios -->
                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Agregar Usuario
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="w-1/5 border px-4 py-2 text-center">{{ __('Nombre') }}</th>
                                <th class="w-1/5 border px-4 py-2 text-center">{{ __('Email') }}</th>
                                <th class="w-1/5 border px-4 py-2 text-center">{{ __('Acciones') }}</th>
                                <th class="w-1/5 border px-4 py-2 text-center">{{ __('Detalles') }}</th>
                                <th class="w-1/5 border px-4 py-2 text-center">{{ __('Rol') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $user->email }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-900">{{ __('Editar') }}</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('{{ __('¿Estás seguro?') }}')">{{ __('Eliminar') }}</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('users.show', $user) }}" title="{{ __('Ver Detalles') }}">
                                        <img src="{{ asset('eyes.png') }}" alt="{{ __('Ver Detalles') }}" class="w-9 h-6 mx-auto">
                                    </a>
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <form action="{{ route('users.assign-role', $user) }}" method="POST">
                                        @csrf
                                        <select name="role" onchange="this.form.submit()" class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
