@props(['class' => ""])

<aside class="{{$class . " px-3 py-2 bg-light-color-1 dark:bg-dark-color-1 dark:border-r dark:border-r-dark-color-2"}}">
    <div class="flex justify-between mb-10">
        <img src="{{asset("/images/logo.png")}}" width="50" alt="logo">

        <x-toggle-theme.toggle-theme />
    </div>

    <x-user-card-sidebar.user-card-sidebar />

    <x-sidebar.separator />
    
    <nav>
        <x-sidebar.link route="dashboard">
            Dashboard
        </x-sidebar.link>
        <x-sidebar.link route="home">
            Home
        </x-sidebar.link>
        <x-sidebar.link route="users.index">
            Usuarios
        </x-sidebar.link>
    </nav>
</aside>