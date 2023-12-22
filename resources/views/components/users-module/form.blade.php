@props(['title' => 'Crear Usuario', 'mode' => 'create', 'id' => 0, 'name' => '', 'email' => '', 'role' =>
\App\Enums\UserModule\ROLE::SELLER, 'status' => \App\Enums\UserModule\STATUS::ENABLED ])

<div class="p-4">
    <x-text.title>
        {{_($title)}}
    </x-text.title>

    <x-cards.main-card>
        <x-form.form action="{{($mode === 'create') ? route('users.store') : route('users.update')}}">

            <x-form.label for="name">
                Nombre:
                <x-form.input id="name" name="name" value="{{$name}}" />
                <x-error-message.error-message for="name" />
            </x-form.label>

            <x-form.label for="email">
                Email:
                <x-form.input type="email" id="email" name="email" value="{{$email}}" />
                <x-error-message.error-message for="email" />
            </x-form.label>

            <x-form.label for="role">
                Rol:
                <x-form.select name="role" id="role">

                    @if ($mode === 'create')
                    <x-form.option value="1">
                        Administrador
                    </x-form.option>
                    @endif

                    <x-form.option value="2"
                        :selected="($mode === 'create') && ($role === \App\Enums\UserModule\ROLE::SELLER)">Vendedor/a
                    </x-form.option>
                    <x-form.option value="3"
                        :selected="!($mode === 'create') && ($role === \App\Enums\UserModule\ROLE::SECRETARY)">
                        Secretario/a</x-form.option>
                </x-form.select>
            </x-form.label>

            <x-text.paragraph>
                Estado:
            </x-text.paragraph>
            <div class="flex items-center flex-row gap-2 my-6 ">
                <x-form.label for="enabled">
                    Activado
                </x-form.label>
                <x-form.radiobutton id="enabled" name="status" value="enabled"
                    :checked="($mode === 'create') ? true : $status->isEnabled()" />

                <x-form.label for="disabled">
                    Desactivado
                </x-form.label>
                <x-form.radiobutton id="disabled" name="status" value="disabled"
                    :checked="($mode === 'edit') && !$status->isEnabled()" />
            </div>

            @if ($mode === 'create')
            <x-form.label for="password">
                Contraseña:
                <x-form.input type="password" name="password" id="password" />
                <x-error-message.error-message for="password" />
            </x-form.label>

            <x-form.label for="password_confirmation">
                Confirmar contraseña:
                <x-form.input type="password" name="password_confirmation" id="password_confirmation" />
            </x-form.label>
            @endif

            <div class="mt-4 flex justify-center">
                <x-button.button type="submit">
                    @if ($mode === "create")
                    {{_('Crear Usuario')}}
                    @endif

                    @if($mode === "edit")
                    {{_('Actualizar Usuario')}}
                    @endif
                </x-button.button>
            </div>
        </x-form.form>
    </x-cards.main-card>
</div>
