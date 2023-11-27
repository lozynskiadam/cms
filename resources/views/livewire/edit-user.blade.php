<x-card size="5" title="Edit user">
    <form wire:submit="update">
        <x-input label="Nazwa" field="user.name"/>
        <x-input label="Email" field="user.email"/>
        <x-form-buttons :back-url="route('users.index')"/>
    </form>
</x-card>
