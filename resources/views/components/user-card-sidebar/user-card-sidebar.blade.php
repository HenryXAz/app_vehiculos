<nav class="w-full my-10" x-data="user_card_sidebar">
    <button
        class="border rounded-md border-gray-300 dark:border-gray-700 p-2 wire:bg-transparent outline-none flex justify-between w-full hover:cursor-pointer"
        @click="openOptions">
        <p class="text-sm dark:text-gray-200 text-gray-800">
            {{Auth::user()->email}}
        </p>
        <span class="font-light text-gray-600 dark:text-gray-200" x-show="!showOptions">
            ▼
        </span>

        <span class="font-light text-gray-600 dark:text-gray-200" x-show="showOptions">
            ▲
        </span>

    </button>

    <ul class="w-full flex flex-col border-b border-b-gray-300 dark:border-b-gray-600  rounded-md" x-show="showOptions"
        x-transition.duration.300ms>
        <li>
            <x-user-card-sidebar.link href="#">
                Perfil
            </x-user-card-sidebar.link>
        </li>
        <li>
            <x-form.form action="/auth/log-out" method="POST">
                <x-user-card-sidebar.link type="submit">
                    Cerrar Sesión
                </x-user-card-sidebar.link>
            </x-form.form>
        </li>
    </ul>
</nav>