<x-layouts.app>
    <div class="p-4">
        <x-text.title>Usuarios</x-text.title>
        <div class="my-5 flex justify-end">
            <x-button.button href="{{route('users.create')}}" variant="rose">
                Nuevo Usuario
                </x-button>
        </div>

        <x-error-message.error-message for="error_type" position="center" />

        <x-cards.main-card>
            <x-form.form action="{{route('users.search')}}" method="GET">
                <div class="mt-6 mb-2w-full flex justify-center gap-4">

                    <x-form.input id="search" name="search" />
                    <x-button.button type="submit">
                        buscar
                    </x-button.button>

                </div>
            </x-form.form>

            @if (isset($users) && count($users->data) > 0)
            <div class="w-full mt-5 mb-2 overflow-x-auto">
                <x-table.table>
                    <x-table.thead>
                        <x-table.row>
                            <x-table.column type="thead">
                                Nombre
                            </x-table.column>
                            <x-table.column type="thead">
                                Email
                            </x-table.column>
                            <x-table.column type="thead">
                                Estatus
                            </x-table.column>
                            <x-table.column type="thead">
                                Rol
                            </x-table.column>
                            <x-table.column type="thead">
                                Acciones
                            </x-table.column>
                        </x-table.row>
                    </x-table.thead>
                    <x-table.tbody>
                        @foreach ($users->data as $user)
                            <x-table.row>
                                <x-table.column>
                                    {{ $user->name }}
                                </x-table.column>
                                <x-table.column>
                                    {{$user->email }}
                                </x-table.column>
                                <x-table.column>
                                    <span class="{{ (($user->status === \App\Enums\UserModule\STATUS::ENABLED) ? 'bg-emerald-300 dark:bg-emerald-600' : 'bg-red-300 dark:bg-red-600' ). ' text-gray-700 dark:text-gray-200 inline-block p-1 rounded-md'  }}">
                                        {{$user->status->value() }}
                                    </span>
                                </x-table.column>
                                <x-table.column>
                                    {{$user->role->value() }}
                                </x-table.column>
                                <x-table.column>
                                    <div class="flex gap-2 justify-center items-center">
                                        <x-button.button variant="amber-transparent"
                                            href="{{route('users.edit', $user->email)}}"
                                        >
                                            Editar
                                        </x-button.button>
                                        <x-button.button variant="rose-transparent"
                                            href="{{route('users.destroy', $user->id)}}"
                                        >
                                            Eliminar
                                        </x-button.button>
                                    </div>
                                </x-table.column>
                            </x-table.row>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>
            </div>
            @else
            <x-text.paragraph position="center" class="my-5 font-light">
                Ningún usuario coincide con esta entrada
            </x-text.paragraph>
            @endif
        </x-cards.main-card>
    </div>
</x-layouts.app>
