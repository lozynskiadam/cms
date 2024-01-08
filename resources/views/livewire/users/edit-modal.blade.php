<x-modal title="Edytuj" id="user-edit-modal">
    <form wire:submit="update">
        <x-inputs.text label="Nazwa" field="user.name"/>
        <x-inputs.text label="Email" field="user.email"/>
        <x-inputs.select label="Status" field="user.status" :options="\App\Enums\UserStatus::cases()"/>
        <x-inputs.checkbox-list label="Role" field="roles" :options="\App\Enums\UserRole::cases() "/>

        <div class="modal-buttons">
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </div>
    </form>
</x-modal>
