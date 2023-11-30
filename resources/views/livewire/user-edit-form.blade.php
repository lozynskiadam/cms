<form wire:submit="update">
    <x-input label="Nazwa" field="user.name" value="{{ $user->name }}"/>
    <x-input label="Email" field="user.email" value="{{ $user->email }}"/>
    <x-form-buttons :back-url="route('users.index')"/>
</form>
