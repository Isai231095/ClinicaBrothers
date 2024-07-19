<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">{{ __('Nombre') }}</th>
                                <th class="border px-4 py-2">{{ __('Email') }}</th>
                                <th class="border px-4 py-2">{{ __('Acciones') }}</th>
                                <th class="border px-4 py-2">{{ __('Detalles') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-900">{{ __('Editar') }}</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('{{ __('¿Estás seguro?') }}')">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('users.show', $user) }}" title="{{ __('Ver Detalles') }}">
                                        <img src="{{ asset('eyes.png') }}" alt="{{ __('Ver Detalles') }}" class="w-13 h-5">
                                    </a>
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
