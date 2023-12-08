<x-layouts.guest>
    <div class="max-w-xl mx-auto">
        <div class="w-full flex justify-center">
            <img src="{{asset("images/logo.png")}}" width="100" alt="logo">
        </div>

        <x-error-message.error-message for="error_login" position="center" />

        <x-cards.main-card>
            <x-form.form action="{{route('auth.login.store')}}">
                <x-form.label for="email">
                    Email:
                    <x-form.input type="email" name="email" id="email" />
                    <x-error-message.error-message for="email" />
                </x-form.label>
                <x-form.label for="password">
                    Password:
                    <x-form.input type="password" name="password" id="password" />
                    <x-error-message.error-message for="password" />
                </x-form.label>

                <x-form.label for="password_confirmation">
                    Password:
                    <x-form.input type="password" name="password_confirmation" id="password_confirmation" />
                </x-form.label>

                <x-form.label for="remember">
                    Recordar usuario
                    <x-form.checkbox id="remember" name="remember" />
                </x-form.label>

                <div class="mt-4 flex justify-center">
                    <x-button.button type="submit">
                        Iniciar Sesión
                    </x-button.button>
                </div>
            </x-form.form>
        </x-cards.main-card>
    </div>
</x-layouts.guest>