<form wire:submit="update">
    <x-input label="Nazwa" field="user.name" value="{{ $user->name }}"/>
    <x-input label="Email" field="user.email" value="{{ $user->email }}"/>
    <x-select label="Status" field="user.status" value="{{ $user->status }}" :options="\App\Enums\UserStatus::cases()"/>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Zapisz</button>
    </div>
</form>
