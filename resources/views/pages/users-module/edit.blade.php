<x-layouts.app>
    <x-users-module.form
    title="Detalles de Usuario"
    mode="edit"
    :id="$user->id"
    :name="$user->name"
    :email="$user->email"
    :role="$user->role"
    :status="$user->status"
/>
</x-layouts.app>
